<?php

require 'vendor/autoload.php';

$template = new League\Plates\Engine('templates','tpl');

//Parametri di connessione
$dsn = 'mysql:host=localhost;dbname=db_abanio';

$user = 'abanio';
$password = '************';

$pdo = new PDO($dsn, $user, $password);

$stmt = $pdo->query("SELECT * FROM prodotto");

$prodotti = $stmt->fetchAll();

echo $template->render('negozio',[
    'prodotti' => $prodotti
]);