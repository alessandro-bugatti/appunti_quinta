<?php

require 'vendor/autoload.php';

$templates = new League\Plates\Engine('templates','tpl');

$dsn = 'mysql:host=localhost;dbname=scuol';

$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);

$risposta = $pdo->query('SELECT * FROM studente');

$studenti = $risposta->fetchAll();

//var_dump($studenti);

echo $templates->render('pdo',
    [
        'studenti' => $studenti,
    ]
);
