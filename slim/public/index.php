<?php

use Controller\AdminController;
use Controller\ProdottoController;
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require_once '../conf/config.php';

$container = new Container();

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->setBasePath(BASE_PATH);

$container->set('template', function (){
   $engine = new \League\Plates\Engine('../templates', 'tpl');
   $engine->addData(['base_path' => BASE_PATH]);
   return $engine;
});

// Define Custom Error Handler
$customErrorHandler = function (
    Request $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails
) use ($app) {
    $payload = ['error' => $exception->getMessage()];

    $response = $app->getResponseFactory()->createResponse();
    $engine = $app->getContainer()->get('template');

    if ($exception instanceof \Slim\Exception\HttpNotFoundException) {
        $response->getBody()->write(
            $engine->render('404', $payload)
        );
    }else{
        $response->getBody()->write(
            "Errore nella pagina"
        );
    }


    return $response;
};


$errorMiddleware = $app->addErrorMiddleware(true, true, true);
//Imposta un gestore degli errori personalizzato
if (MY_ERROR_HANDLER)
    $errorMiddleware->setDefaultErrorHandler($customErrorHandler);


$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Ciao mondo");
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write('Hello,' .  $name);
    return $response;
});

$app->get('/negozio', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Ciao, siamo nel negozio");
    return $response;
});

$app->get('/saluti/{name}', function (Request $request, Response $response, array $args) {
    $template = new \League\Plates\Engine('../templates','tpl');
    $name = $args['name'];
    $html = $template->render('saluti',[
        'name' => $name
    ]);
    $response->getBody()->write($html);
    return $response;
});


//Prima versione, senza controller
$app->get('/prodotti', function (Request $request, Response $response, array $args) {
    $prodotti = \Model\ProdottoRepository::listAll();
    $template = new \League\Plates\Engine('../templates','tpl');

    $html = $template->render('prodotti',[
        'prodotti' => $prodotti
    ]);
    $response->getBody()->write($html);
    return $response;
});

$app->get('/elenco', ProdottoController::class . ':listAll');

$app->get('/elenco/genere/{genere}', ProdottoController::class . ':listAllByGenre');

$app->get('/elenco/categorie/{categoria}',null);

$app->get('/pannelloAdmin', AdminController::class . ':listAll');

$app->get('/pannelloAdmin/prodotto', AdminController::class . ':formProdotto');

$app->post('/pannelloAdmin/prodotto', AdminController::class . ':aggiungiProdotto');



$app->run();