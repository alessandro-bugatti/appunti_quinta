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

$id_cliente = $_GET['id'];

$stmt = $pdo->prepare('DELETE FROM cliente WHERE id = :id_cliente');

$stmt->execute(
  [
      'id_cliente' => $id_cliente
  ]
);

//Controlliamo se l'operazione è andata a buon fine

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

// Render a template
echo $templates->render('eliminazione',[
    ]);