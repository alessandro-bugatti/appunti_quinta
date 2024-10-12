<?php

//Serve per poi utilizzare le librerie
require 'vendor/autoload.php';

//Istanzia il motore di template di Plates
//Primo parametro: cartella che contiene i file di template
//Secondo parametro: l'estensione di questi file
$templates = new League\Plates\Engine('templates','tpl');

//Logica del controller

$dati = $_POST;

$testo = $_POST['testo'];

if (isset($_POST['checkbox1'])){
    $arrivato = true;
}
else{
    $arrivato = false;
}
//Rendering, cioè la creazione dell'HTML che tornerà al client

//Primo parametro: nome del file che verrà reso
//Secondo parametro (opzionale): un vettore con i dati da passare al template
echo $templates->render('form',
[
    'dati' => $dati,
    'testo' => $testo,
    'arrivato' => $arrivato,
]);
