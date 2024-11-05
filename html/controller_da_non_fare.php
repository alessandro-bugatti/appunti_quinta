<?php

//Serve per poi utilizzare le librerie
require 'vendor/autoload.php';

//Istanzia il motore di template di Plates
//Primo parametro: cartella che contiene i file di template
//Secondo parametro: l'estensione di questi file
$templates = new League\Plates\Engine('templates','tpl');

$costo = 0;

//Logica del controller
if (isset($_POST['costo']))
    $costo = $_POST['costo'];

//Primo parametro: nome del file che verrà reso
//Secondo parametro (opzionale): un vettore con i dati da passare al template
echo $templates->render('da_non_fare',
[
    'costo' => $costo,
]);
