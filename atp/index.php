<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require 'Controller/TennistaController.php';

use League\Plates\Engine;
use Util\Connection;
use Controller\TennistaController;
use DI\Container as Container;


//Include il file di configurazione con le credenziali di accesso al database
$config = require 'conf/config.php';


//Righe per creare un container per la DI
//Deve essere creato prima di istanziare l'app
$container = new Container();

// Da inserire prima della create di AppFactory
AppFactory::setContainer($container);


$app = AppFactory::create();

//Istruzione super importante per il deployment
$app->setBasePath($config['BASEPATH']);

//Inserisco nel container le informazioni di configurazione
$container->set('config', function () use ($config) {
    return $config;
});

//Inserisce l'oggetto template nel container
$container->set('template', function ($container) {
    $config = $container->get('config');
    $engine = new Engine('templates', 'tpl');
    $engine->addData(['base_path' => $config['BASEPATH']]);
    return $engine;
});


//Esempio di gestione degli errori più strutturata

$app->addRoutingMiddleware();


//Custom Error Handler, per una gestione personalizzata
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
    }else if($exception instanceof HttpUnauthorizedException){
        $response->getBody()->write(
            "Utente non loggato"
        );
    }
    else{
        $response->getBody()->write(
            $engine->render('oops', $payload)
        );
    }
    return $response;
};

/**
 * Add Error Middleware
 *
 * @param bool                  $displayErrorDetails -> Should be set to false in production
 * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
 * @param bool                  $logErrorDetails -> Display error details in error log
 * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger
 *
 * Note: This middleware should be added last. It will not handle any exceptions/errors
 * for middleware added after it.
 */
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
//Se si è in produzione il gestore di default viene sostituito con quello personlalizzato
if ($config['PRODUCTION']) {
    $errorMiddleware->setDefaultErrorHandler($customErrorHandler);
}


//Pagina di accesso
$app->get('/', function (Request $request,
                                      Response $response,
                                      array $args): Response {
    $templates = new Engine('templates','tpl');
    $pagina = $templates->render('rotte', [
        'basepath' => BASEPATH,
    ]);
    $response->getBody()->write($pagina);
    return $response;
});


//Rotta che risponde a una GET sull'URL /tennisti/{id} chiamando il
//metodo listById della classe TennistaController
$app->get('/tennisti/{id}', TennistaController::class . ':listById');

//Esempio di rotta che prende i suoi dati dal database
$app->get('/tennisti/altezza/{altezza}', function (Request $request,
                                      Response $response,
                                      array $args): Response {
    global $config;
    $pdo = Connection::getInstance($config);

    $stmt = $pdo->prepare('SELECT * FROM players WHERE height_cm > :altezza');

    $stmt->execute(['altezza' => $args['altezza']]);

    $players = $stmt->fetchAll();

    $templates = new Engine('templates','tpl');

    if($players) {
        $pagina = $templates->render('playersHeight', [
            'players' => $players,
            'basepath' => BASEPATH,
            'altezza' => $args['altezza'],
        ]);
    }else{
        $pagina = $templates->render('no_data', [] );
    }

    $response->getBody()->write($pagina);
    return $response;
});

$app->get('/ricerca/cognome', function (Request $request,
                                         Response $response,
                                         array $args): Response {
    $players = [];

    $templates = new Engine('templates','tpl');
    $pagina = $templates->render('searchByLastname', [
        'basepath' => BASEPATH,
        'players' => $players,
    ]);
    $response->getBody()->write($pagina);
    return $response;
});


//Pagina di accesso
$app->post('/ricerca/cognome', function (Request $request,
                         Response $response,
                         array $args): Response {
    global $config;
    $pdo = Connection::getInstance($config);

    //IL modo più semplice per inviare una query al DB è di utilizzare
    //il metodo query. Per le query costanti è OK
    $stmt = $pdo->prepare('SELECT * FROM players WHERE LOWER(last_name) = LOWER(:lastname)');

    $data = $request->getParsedBody();

    $stmt->execute(['lastname' => $data['lastname']]);

    $players = $stmt->fetchAll();


    $templates = new Engine('templates','tpl');
    $pagina = $templates->render('searchByLastname', [
        'basepath' => BASEPATH,
        'players' => $players,
    ]);
    $response->getBody()->write($pagina);
    return $response;
});


$app->run();