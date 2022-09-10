<?php

require 'config.php';
require 'vendor/autoload.php';
use League\Plates\Engine;

$dsn = 'mysql:host=' . HOSTNAME . ';dbname=' . DBNAME . ';charset=utf8';

try {
    $pdo = new PDO($dsn, USERNAME, PASSWORD);
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

$targa = $_POST['targa'];
$marca = $_POST['marca'];
$modello = $_POST['modello'];
$costo = $_POST['costo'];
$immagine = $targa . ".png";

$uploaddir = 'immagini/';
$uploadfile = $uploaddir . $immagine; //basename($_FILES['immagine']['name']);
//var_dump($uploadfile);
//var_dump($_FILES['immagine']);
//exit(0);

//Sposto il file uploadato nella sua posizione definitiva
if (move_uploaded_file($_FILES['immagine']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

$stmt = $pdo->prepare('INSERT INTO auto (targa, marca, modello, costo_giornaliero, immagine) VALUES (:targa, :marca, :modello, :costo, :immagine)');

$stmt->execute(
  [
      'targa' => $targa,
      'marca' => $marca,
      'modello' => $modello,
      'costo' => $costo,
      'immagine' => $immagine
  ]
);

exit(0);

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');



header("Location: elenco.php");

// Render a template
/*
echo $templates->render('effettua_modifica',[
        'cliente' => $_POST
    ]);
*/