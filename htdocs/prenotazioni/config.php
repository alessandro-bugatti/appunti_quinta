<?php

//Dice a livello dello script che gli errori verranno mostrati
//e che non verranno loggati
ini_set('display_errors', 1);
ini_set('log_errors', 0);

//Variabili dell'applicazione
$LUNGHEZZA_CODICE = 10;

$PERSONE_MASSIME_PER_GIORNO = 2;
$GIORNI_PRENOTABILI = 7;

$host = 'localhost';
$db = 'tamponi';
$user = 'root';
$pass = '';

//Stringa di connessione
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;


$pdo = new PDO($dsn, $user, $pass);

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

session_start();