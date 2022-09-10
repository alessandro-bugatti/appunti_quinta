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

$id_cliente = $_SESSION['cliente']['id'];

$numero_conto = $_POST['numero_conto'];
$saldo = $_POST['saldo'];
$id_filiale = $_POST['id_filiale'];

$stmt = $pdo->prepare('INSERT INTO conto_corrente (numero_conto, saldo, id_filiale) VALUES (:numero_conto, :saldo, :id_filiale)');

$stmt->execute(
  [
      'numero_conto' => $numero_conto,
      'saldo' => $saldo,
      'id_filiale' => $id_filiale
  ]
);

$stmt = $pdo->query('SELECT LAST_INSERT_ID() AS id FROM conto_corrente');

$result = $stmt->fetch();
$id_conto = $result['id'];

$stmt = $pdo->prepare('INSERT INTO intestato (id_cliente, id_conto_corrente) VALUES (:id_cliente, :id_conto)');

$stmt->execute(
    [
        'id_cliente' => $id_cliente,
        'id_conto' => $id_conto
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