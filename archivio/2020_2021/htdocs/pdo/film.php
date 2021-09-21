<?php

echo "Hello";

ini_set('display_errors', 1);
ini_set('log_errors', 0);

//Parametri di connessione
$host = 'localhost';
$db   = 'film';
$user = 'root';
$pass = '';
$charset = 'utf8';

//Configuro il Data Source Name
//Il primo pezzo indica il driver da utilizzare, nel nostro caso MySQL
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
/*
 *
 $opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
*/
//Oggetto che rappresenta la connessione al database
$pdo = new PDO($dsn,$user,$pass);

$stmt = $pdo->query('SELECT * FROM film');
//var_dump($stmt);
echo json_encode( $stmt->fetchAll());
//$pdo = new PDO($dsn, $user, $pass, $opt);


