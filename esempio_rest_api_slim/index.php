<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';

$app = AppFactory::create();


//Istruzione super importante per il deployment
$app->setBasePath('/esempio_rest');

$app->get('/', function (Request $request,
                         Response $response,
                         $args) {

    $data = file_get_contents("index.html");

    $response->getBody()->write($data);
    return $response;
});

$app->get('/hello', function (Request $request,
                         Response $response,
    $args) {
    $data = ['hello' => 'Bob'];

    $response->getBody()->write(json_encode($data));
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/giocatori', function (Request $request,
                         Response $response,
    $args) {
    $squadra = [
        "nome" => "AC Bluestar",
        "giocatori" => [
            [
                "nome" => "Luca Rossi",
                "numero" => 10,
                "ruolo" => "Attaccante",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "Marco Bianchi",
                "numero" => 8,
                "ruolo" => "Centrocampista",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "David Moreira",
                "numero" => 5,
                "ruolo" => "Difensore",
                "nazionalità" => "Portoghese"
            ],
            [
                "nome" => "Tomás Novak",
                "numero" => 1,
                "ruolo" => "Portiere",
                "nazionalità" => "Ceca"
            ]
        ]
    ];
    $response->getBody()->write(json_encode($squadra['giocatori']));
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/giocatori/{numero}', function (Request $request,
                                  Response $response,
                                $args) {
    $squadra = [
        "nome" => "AC Bluestar",
        "giocatori" => [
            [
                "nome" => "Luca Rossi",
                "numero" => 10,
                "ruolo" => "Attaccante",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "Marco Bianchi",
                "numero" => 8,
                "ruolo" => "Centrocampista",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "David Moreira",
                "numero" => 5,
                "ruolo" => "Difensore",
                "nazionalità" => "Portoghese"
            ],
            [
                "nome" => "Tomás Novak",
                "numero" => 1,
                "ruolo" => "Portiere",
                "nazionalità" => "Ceca"
            ]
        ]
    ];
    $giocatori = $squadra['giocatori'];
    $numero = $args['numero'];
    if (array_key_exists($numero, $giocatori)) {
        $giocatore = $giocatori[$numero];
        $response->getBody()->write(json_encode($giocatore));
    }
    else{
        $response->getBody()->write(json_encode(['errore' => 'giocatore inesistente']));
    }
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/giocatori/maglia/{numero}', function (Request $request,
                                           Response $response,
    $args) {
    $squadra = [
        "nome" => "AC Bluestar",
        "giocatori" => [
            [
                "nome" => "Luca Rossi",
                "numero" => 10,
                "ruolo" => "Attaccante",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "Marco Bianchi",
                "numero" => 8,
                "ruolo" => "Centrocampista",
                "nazionalità" => "Italiana"
            ],
            [
                "nome" => "David Moreira",
                "numero" => 5,
                "ruolo" => "Difensore",
                "nazionalità" => "Portoghese"
            ],
            [
                "nome" => "Tomás Novak",
                "numero" => 1,
                "ruolo" => "Portiere",
                "nazionalità" => "Ceca"
            ]
        ]
    ];
    $giocatori = $squadra['giocatori'];
    $numero = $args['numero'];
    if (array_key_exists($numero, $giocatori)) {
        $giocatore = $giocatori[$numero];
        $response->getBody()->write(json_encode($giocatore));
    }
    else{
        $response->getBody()->write(json_encode(['errore' => 'giocatore inesistente']));
    }
    return $response
        ->withHeader('Content-Type', 'application/json');
});


$app->run();