<?php

namespace Controller;

use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require_once 'Model/TennistaRepository.php';
use Model\TennistaRepository;

class TennistaController{

    private $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listById(Request $request, Response $response, array $args): Response
    {
        $engine = $this->container->get('template');
        $player = TennistaRepository::getTennistaById($args['id']);
        if ($player) {
            $pagina = $engine->render('player', [
                'first_name' => $player['first_name'],
                'last_name' => $player['last_name'],
                'birthplace' => $player['birthplace'],
                'height_cm' => $player['height_cm'],
                'player_url' => $player['player_url'],
                'player_id' => $player['player_id'],
            ]);
        } else {
            $pagina = $engine->render('no_data', []);
        }
        $response->getBody()->write($pagina);
        return $response;
    }
}
