<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

use League\Plates\Engine;
use Util\Connection;

//Include il file di configurazione con le credenziali di accesso al database
require 'conf/config.php';

$app = AppFactory::create();

//Istruzione super importante per il deployment
$app->setBasePath(BASEPATH);


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
$app->get('/tennisti/{id}', function (Request $request,
                         Response $response,
                         array $args): Response {
    $pdo = Connection::getInstance(BASEPATH);

    //Impostiamo la "forma" dei dati che verranno restituiti da una
    //query come delle mappe associative
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //IL modo più semplice per inviare una query al DB è di utilizzare
    //il metodo query. Per le query costanti è OK
    $stmt = $pdo->prepare('SELECT * FROM players WHERE player_id = :id');

    $stmt->execute(['id' => $args['id']]);

    $player = $stmt->fetch();

    $templates = new Engine('templates','tpl');

    if($player) {
        $pagina = $templates->render('player', [
            'first_name' => $player['first_name'],
            'last_name' => $player['last_name'],
            'birthplace' => $player['birthplace'],
            'height_cm' => $player['height_cm'],
            'player_url' => $player['player_url'],
            'player_id' => $player['player_id'],
        ]);
    }else{
        $pagina = $templates->render('no_data', [] );
    }

    $response->getBody()->write($pagina);
    return $response;
    //Chiamando il metodo fetchAll vengono recuperati e restituiti
    //tutti le righe della tabella tennista
    //$response->getBody()->write(json_encode($stmt->fetchAll()));
    //return $response
    //    ->withHeader('Content-Type', 'application/json');
});


//Esempio di rotta che prende i suoi dati dal database
$app->get('/tennisti/altezza/{altezza}', function (Request $request,
                                      Response $response,
                                      array $args): Response {
    $pdo = Connection::getInstance(BASEPATH);

    //Impostiamo la "forma" dei dati che verranno restituiti da una
    //query come delle mappe associative
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //IL modo più semplice per inviare una query al DB è di utilizzare
    //il metodo query. Per le query costanti è OK
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
    $pdo = Connection::getInstance(BASEPATH);

    //Impostiamo la "forma" dei dati che verranno restituiti da una
    //query come delle mappe associative
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

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