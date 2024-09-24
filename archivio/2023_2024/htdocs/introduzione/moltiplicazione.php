<?php

/*
 * Questo + il controller dell'applicazione moltiplicazione
 */

require 'vendor/autoload.php';

$templates = new League\Plates\Engine('templates','tpl');

$a = $_POST['a'];
$b = $_POST['b'];


$risultato = $a * $b;

echo $templates->render('moltiplicazione',[
    'risultato' => $risultato
]);