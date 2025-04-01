<?php

require 'conf/config.php';
require 'vendor/autoload.php';
use League\Plates\Engine;
use Model\ImageRepository;


// Create new Plates instance
$templates = new Engine('templates', 'tpl');

$successo = false;
$immagini = [];

if(isset($_FILES["immagine"])){
    $name = basename($_FILES["immagine"]["name"]);
    if ($_FILES["immagine"]["type"] == "image/jpeg") {
        $nome_univoco = sha1($name . rand()) . '.jpg';
        //echo $nome_univoco;
        $posizione_finale  = UPLOAD_DIR . '/' . $nome_univoco;
        if(move_uploaded_file($_FILES['immagine']['tmp_name'], $posizione_finale)){
            $successo = ImageRepository::addImage($posizione_finale);
        }
    }
}

$immagini = ImageRepository::listAll();

echo $templates->render('galleria', [
    'immagini' => $immagini,
    'successo' => $successo
]);
