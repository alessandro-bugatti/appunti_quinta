<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath("/slim");

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/altra_pagina', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Questa è un'altra pagina");
    return $response;
});

$app->get('/ciao/{nome}', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Ciao" . $args['nome']);
    return $response;
});

$app->get('/car/{id}', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Dettagli auto con id = " . $args['id']);
    return $response;
});

$app->get('/cars', function (Request $request, Response $response, $args) {
    $cars[] = [
        'nome' => 'Ferrari',
        'costo' => '80000'
    ];
    $cars[] = [
        'nome' => 'Fiat',
        'costo' => '8000'
    ];
    $risposta = json_encode($cars);
    $response->getBody()->write($risposta);
    return $response
        ->withHeader('Content-Type', 'application/json');
});

$app->get('/sensors/{name}', function (Request $request, Response $response, $args) {
    $risposta =<<<OEF
    {"sensors":[{"description":"lampadina","id":"s-01","lat":"46.09273","lng":"-88.64235","place":"Iron River","readonly":false,"state_code":"US","value":false},{"description":"lampadina","id":"s-02","lat":"31.28092","lng":"74.85849","place":"Patti","readonly":false,"state_code":"IN","value":false},{"description":"allarme atomico","id":"s-03","lat":"46.65581","lng":"32.6178","place":"Kherson","readonly":false,"state_code":"UA","value":true},{"description":"porta aperta","id":"s-04","lat":"32.9156","lng":"-117.14392","place":"Mira Mesa","readonly":false,"state_code":"US","value":false},{"description":"sensore di temperatura","id":"temperature-01","lat":"15.45144","lng":"78.14797","place":"Betamcherla","readonly":true,"state_code":"IN","value":79.28317129259372},{"description":"sensore di umidit\u00e1","id":"umidita-01","lat":"43.4125","lng":"23.225","place":"Montana","readonly":true,"state_code":"BG","value":76.74581659312568},{"description":"sensore di bellezza del codice","id":"cleancode-01","lat":"65.84811","lng":"24.14662","place":"Tornio","readonly":true,"state_code":"FI","value":48.463525006859314},{"description":"sensore di luce","id":"luce-01","lat":"54.39635","lng":"24.04142","place":"Alytus","readonly":true,"state_code":"LT","value":7.6420400054329765}]}
OEF;
    for ($i = 0; $i < 10; $i++)
    {
        $dati[] = [
            "description" => "lampadina",
            "id" => $i];
    }
    $risposta = [
        "sensors" => $dati
    ];
    $dsn = 'mysql:host=' . 'localhost' . ';dbname=' . 'world' . ';charset=utf8';

    try {
        $pdo = new PDO($dsn, 'root', '');
    } catch (Exception $e) {
        echo $e->getMessage();
        exit(1);
    }

    $country = $args['name'];
    $stmt = $pdo->query('SELECT Name, Population FROM country WHERE Name  = "' .
        $country . '"');
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $risposta = [
        "sensors" => $result
    ];

    $risposta = json_encode($risposta);
    $response->getBody()->write($risposta);
    return $response
        ->withHeader('Content-Type', 'application/json');
});



$app->run();
