<?php

//Esempio di file di configurazione
//Creare un file config.php e inserire le seguenti righe
//adattandole alla propria configurazione

//Variabili dell'applicazione
$LUNGHEZZA_CODICE = 10;

$PERSONE_MASSIME_PER_GIORNO = 2;
$GIORNI_PRENOTABILI = 7;

//Dice a livello dello script che gli errori verranno mostrati
//e che non verranno loggati
ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'your_host';
$db = 'your_db';
$user = 'your_username';
$pass = 'your_password';

//Stringa di connessione
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;


$pdo = new PDO($dsn, $user, $pass);

$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

session_start();

//Stringa di connessione
$dsn = 'mysql:host=' . $host . ';dbname=' . $db;


$pdo = new PDO($dsn, $user, $pass);

//Trasforma tutti gli errori SQL in eccezioni PHP
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );