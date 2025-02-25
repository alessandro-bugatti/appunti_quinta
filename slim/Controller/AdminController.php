<?php

namespace Controller;

use Model\ProdottoRepository;
use Psr\Container\ContainerInterface;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AdminController{

    private $container;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listAll(Request $request, Response $response, array $args): Response
    {
        $engine = $this->container->get('template');
        $prodotti = ProdottoRepository::listAll();
        $html = $engine->render('pannelloAdmin',
            [
                'prodotti' => $prodotti
            ]
        );
        $response->getBody()->write($html);
        return $response;
    }

    public function formProdotto(Request $request, Response $response, array $args): Response
    {
        //Carica il motore di template
        $engine = $this->container->get('template');
        //Fa il rendering del template che produce il form di inserimento del prodotto
        $html = $engine->render('formProdotto');
        //Restituisce la risposta, cioè il form
        $response->getBody()->write($html);
        return $response;
    }

    public function aggiungiProdotto(Request $request, Response $response, array $args): Response
    {
        //Recupera i dati inviata dalla form e li inserisce in $data
        $data = (array)$request->getParsedBody();
        //Passa i dati al metodo che li inserirà nel db
        ProdottoRepository::aggiungiProdotto($data);
        //Aggiunde un header nella risposta che indica al browser che c'è stata una ridirezione
        $response = $response->withStatus(302);
        //il metodo withHeader con chiave Location indica dove avviene la ridirezione
        return $response->withHeader('Location', BASE_PATH . '/pannelloAdmin');
    }

    public function cancellaProdotto(Request $request, Response $response, array $args): Response
    {
        $id = $args['id'];
        //Passa i dati al metodo che li inserirà nel db
        ProdottoRepository::cancellaProdotto($id);
        //Aggiunde un header nella risposta che indica al browser che c'è stata una ridirezione
        $response = $response->withStatus(302);
        //il metodo withHeader con chiave Location indica dove avviene la ridirezione
        return $response->withHeader('Location', BASE_PATH . '/pannelloAdmin');
    }

    public function formUpdateProdotto(Request $request, Response $response, array $args): Response
    {
        //Recuperiamo l'id del prodotto da modificare
        $id = $args['id'];
        //Carica il motore di template
        $engine = $this->container->get('template');
        //Recupero le informazioni del prodotto
        $prodotto = ProdottoRepository::getProdottoByID($id);
        //Fa il rendering del template che produce il form di inserimento del prodotto
        $html = $engine->render('formUpdateProdotto',[
            'prodotto' => $prodotto
        ]);
        //Restituisce la risposta, cioè il form
        $response->getBody()->write($html);
        return $response;
    }

    public function aggiornaProdotto(Request $request, Response $response, array $args): Response
    {

        $id = $args['id'];
        //Recupera i dati inviata dalla form e li inserisce in $data
        $data = (array)$request->getParsedBody();
        //Passa i dati al metodo che li inserirà nel db
        ProdottoRepository::aggiornaProdotto($data, $id);
        //Aggiunge un header nella risposta che indica al browser che c'è stata una ridirezione
        $response = $response->withStatus(302);
        //il metodo withHeader con chiave Location indica dove avviene la ridirezione
        return $response->withHeader('Location', BASE_PATH . '/pannelloAdmin');
    }
}