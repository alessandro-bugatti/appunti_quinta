<?php

/*
 * Questo + il controller dell'applicazione moltiplicazione
 */

$valori = [
  'Black' => 0,
  'Brown' => 1,
  'Red' => 2,
  'Orange' => 3,
    'Yellow' => 4
];

$colori = [
  'Black',
    'Brown',
    'Red',
    'Orange',
    'Yellow',
    'Green',
    'Blue',
    'Violet',
    'Grey',
    'White'
];

require 'vendor/autoload.php';

$templates = new League\Plates\Engine('templates','tpl');

//La funzione var_dump è per fare debug sporco e veloce
//var_dump($_POST);

$colore = $_POST['primaBanda'];
$valore = $valori[$colore];
$risultato = 42; //Qui andrà messa la formula effettiva


echo $templates->render('resistenza',[
    'colori' => $colori,
    'risultato' => $risultato
]);
