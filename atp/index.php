<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

use League\Plates\Engine;

//Include il file di configurazione con le credenziali di accesso al database
require 'conf/config.php';

$app = AppFactory::create();

//Istruzione super importante per il deployment
$app->setBasePath('/atp');


//Esempio di rotta che prende i suoi dati dal database
$app->get('/tennisti/{id}', function (Request $request,
                         Response $response,
                         array $args): Response {
    //Stringa di connessione al database DSN - Data Source Name
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ;

    //Costruzione dell'oggetto che rappresenta con connessione al DBMS
    $pdo = new PDO($dsn, DB_USER, DB_PASS,);

    //Impostiamo la "forma" dei dati che verranno restituiti da una
    //query come delle mappe associative
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    //IL modo più semplice per inviare una query al DB è di utilizzare
    //il metodo query. Per le query costanti è OK
    $stmt = $pdo->prepare('SELECT * FROM players WHERE player_id = ?');

    $stmt->execute([$args['id']]);

    $player = $stmt->fetch();

    $templates = new Engine('templates','tpl');

    $pagina = $templates->render('player',[
        'first_name' => $player['first_name'],
        'last_name' => $player['last_name'],
        'birthplace' => $player['birthplace'],
        'height_cm' => $player['height_cm'],
        'player_url' => $player['player_url'],
    ]);

    $response->getBody()->write($pagina);
    return $response;
    //Chiamando il metodo fetchAll vengono recuperati e restituiti
    //tutti le righe della tabella tennista
    //$response->getBody()->write(json_encode($stmt->fetchAll()));
    //return $response
    //    ->withHeader('Content-Type', 'application/json');
});

$app->run();