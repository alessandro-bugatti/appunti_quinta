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

//Recupero le informazioni del cliente
$id_cliente = $_GET['id'];

$stmt = $pdo->prepare('SELECT id, nominativo, codice_fiscale FROM cliente WHERE id = :id');

$stmt->execute(
    [
        'id' => $id_cliente
    ]
);

$cliente = $stmt->fetch();

$_SESSION['cliente'] = $cliente;

//Recupero le informazioni della filiale
$stmt = $pdo->query('SELECT * FROM filiale ORDER BY nome');

$filiali = $stmt->fetchAll();


// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

//Da togliere se si vuole funzioni
//$result = [];

// Render a template
echo $templates->render('nuovo_conto',[
    'cliente' => $cliente,
    'filiali' => $filiali
]);