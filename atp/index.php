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

$container = new Container();

// Da inserire prima della create di AppFactory
AppFactory::setContainer($container);


$app = AppFactory::create();

//Istruzione super importante per il deployment
$app->setBasePath($config['BASEPATH']);

$container->set('template', function (){
    global $config;
    $engine = new Engine('templates', 'tpl');
    $engine->addData(['base_path' => $config['BASEPATH']]);
    return $engine;
});

$container->set('config', $config);


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


//Esempio di rotta che prende i suoi dati dal database
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