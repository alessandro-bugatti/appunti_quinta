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

$id_cliente = $_SESSION['id_cliente'];

$stmt = $pdo->prepare('UPDATE cliente SET nominativo = :nominativo, codice_fiscale = :codice_fiscale, citta = :citta, indirizzo = :indirizzo, telefono = :telefono WHERE id = :id_cliente');

$stmt->execute(
  [
      'id_cliente' => $id_cliente,
      'nominativo' => $_POST['nominativo'],
      'codice_fiscale' => $_POST['codice_fiscale'],
      'citta' => $_POST['citta'],
      'indirizzo' => $_POST['indirizzo'],
      'telefono' => $_POST['telefono']
  ]
);

//Controlliamo se l'operazione è andata a buon fine

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

header("Location: elenco.php");

// Render a template
/*
echo $templates->render('effettua_modifica',[
        'cliente' => $_POST
    ]);
*/