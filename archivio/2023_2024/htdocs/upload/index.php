<?php

require 'conf/config.php';
require 'vendor/autoload.php';
use League\Plates\Engine;


// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'tpl');

//Variabile che verrà utilizzato per mostrare il banner in caso
//di upload andato a buon fine
$successo = false;


if(isset($_FILES['immagine'])) {
    $immagine = basename($_FILES['immagine']['name']);
    //Siccome l'applicazione potrebbe ricevere più volte file con
    //lo stesso nome, qui viene generato un nome unico facendo
    //l'hash del nome originale più un numero casuale, si
    //possono usare anche altre strategie
    $nome_univoco = sha1($_FILES['immagine']['name'] . rand()) . '.jpg';

    $uploadfile = UPLOAD_DIR . '/' . $nome_univoco;

    //Il file che arriva dalla form viene salvato
    //temporaneamente in una directory non raggiungibile del web server
    //per essere eventualmente controllato e, se soddisfa i criteri,
    //verrà spostato nella sua posizione definitiva
    //In questo esempio non vengono fatti controlli
    if (move_uploaded_file($_FILES['immagine']['tmp_name'], $uploadfile)) {
        $successo = Model\ImageRepository::addImage($nome_univoco);
    }
}

$immagini = Model\ImageRepository::listAll();

echo $templates->render('galleria',[
    'immagini' => $immagini,
    'successo' => $successo
]);


