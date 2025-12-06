<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require '../vendor/autoload.php';
require 'conf/config.php';

$app = AppFactory::create();

//Istruzione super importante per il deployment
$app->setBasePath('/tennis');

$app->get('/', function (Request $request,
                         Response $response,
                         array $args): Response {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ;
    $pdo = new PDO($dsn, DB_USER, DB_PASS,);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $stmt = $pdo->query ("SELECT * FROM tennista");
    $response->getBody()->write(json_encode($stmt->fetchAll()));
    return $response
        ->withHeader('Content-Type', 'application/json');
    return $response;
});

$app->run();