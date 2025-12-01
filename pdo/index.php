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
                         array $args): Response {
    return $response->withStatus(200);
});

