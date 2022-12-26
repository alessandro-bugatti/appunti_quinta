<?php
//Questo è il controller

//Questa serve per il caricamento delle librerie
require 'vendor/autoload.php';

//L'oggetto che poi si occuperà di gestire il template
$templates = new League\Plates\Engine('templates','tpl');

//Qui ci sarebbe la parte di elaborazione sul modello,
//la M di MVC
//In questo esempio viene creato un vettore nel codice,
//generalmente saranno dei dati estratti da un database

//Accesso ai database con PDO

//Creazione della stringa dsn (Data Source Name)
$dsn = 'mysql:host=localhost;dbname=us_presidential_election';

//Creazione della connessione
$pdo = new PDO($dsn, 'root', '');

$state = $_POST['states'];
$year = $_POST['years'];

$sql = 'SELECT candidate FROM election_data WHERE state = :state AND year = :year AND writein = "FALSE"'; //Il FALSE sul writein serve a togliere i candidati non "reali"

$stmt = $pdo->prepare($sql);

$stmt->execute([
        'state' => $state,
        'year' => $year
    ]
);

$candidates = $stmt->fetchAll();

//Per verificare il funzionamento della funzione escape (e) togliere il commento
//al codice qua sotto e togliere la chiamata $this->e($cognome), sostituendola con $cognome nel template
//$cognome = '<script>alert("Questo è un terribile attacco XSS")</script>';
$data = [
    'candidati' => $candidates,
];

echo $templates->render("elenco_candidati", $data);

