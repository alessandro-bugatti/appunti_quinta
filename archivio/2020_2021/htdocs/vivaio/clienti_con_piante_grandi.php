<?php

ini_set('display_errors', 1);
ini_set('log_errors', 0);

//Parametri di connessione
$host = 'localhost';
$db   = 'vivaio_2';
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


//Voglio sapere tutti i tipi di pino che ci sono nel database
//$stmt = $pdo->query('SELECT nome, cognome, anno_assunzione FROM personale WHERE anno_assunzione > 2005 AND qualifica = "Operaio"');

$tipo = $_GET['tipo'];

$stmt = $pdo->query("SELECT cliente.nominativo
FROM cliente, intervento, intervento_piante, esemplare, tipologia, tipo
WHERE cliente.ID = intervento.id_cliente
AND intervento.ID = intervento_piante.id_intervento
AND intervento_piante.id_esemplare = esemplare.ID
AND esemplare.id_tipologia = tipologia.ID
AND esemplare.id_tipo = tipo.ID
AND tipologia.descrizione = '$tipo'");

var_dump($stmt);

$clienti = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $clienti[] = $row;
}

//var_dump($clienti);

echo json_encode($clienti);

