<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../conf/config.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addErrorMiddleware(APP_ENV === 'development', true, true);

// --- Route di esempio ---

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Progetto didattico - in costruzione');
    return $response;
});

$app->run();
