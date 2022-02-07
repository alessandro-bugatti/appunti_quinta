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

$app->run();
