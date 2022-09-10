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

$stmt = $pdo->query('SELECT id, nominativo, codice_fiscale FROM cliente ORDER BY nominativo');

$result = $stmt->fetchAll();
// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

//Da togliere se si vuole funzioni
//$result = [];

// Render a template
echo $templates->render('elenco',[
    'clienti' => $result
]);