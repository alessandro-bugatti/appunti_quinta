<?php

require 'vendor/autoload.php';
require 'conf/config.php';

$template = new League\Plates\Engine('templates','tpl');

//Parte che recupera tutti i prodotti
$prodotti = \Model\ProdottoRepository::listAll();

//Parte che, in base a un'eventuale scelta dell'utente
//mostra i prodotti di abbigliamento maschile o femminile
$prodottiPerGenere = [];
$genere = null;

if (isset($_GET['genere'])){
    $genere = $_GET['genere'];
    if ($genere == 'Uomo'){
        $prodottiPerGenere = \Model\ProdottoRepository::listAllMale();
    }
    else{
        $prodottiPerGenere = \Model\ProdottoRepository::listAllFemale();
    }
}

echo $template->render('index',[
        'prodotti' => $prodotti,
        'prodottiPerGenere' => $prodottiPerGenere,
        'genere' => $genere,
]
);