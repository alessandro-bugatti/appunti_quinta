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

$stmt = $pdo->query('SELECT cliente.nominativo, data_prenotazione FROM cliente, intervento WHERE cliente.ID = intervento.id_cliente');
//Creo un vettore per contenere le righe del risultato
$clienti = array();
//Scorro la tabella risultato e copio ogni riga nel vettore
while($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $clienti[] = $row['nominativo'];
}

//var_dump($clienti);

//Creo una mappa che come chiave abbia il nominativo e come valore il numero di volte che comprare dentro $clienti
$conteggio = array();

//Scorro tutto il vettore clienti per contare quante volte appare ogni nominativo
foreach ($clienti as $cliente)
{
    //Se lo incontro la prima volta creo una voce nella mappa
    if (!array_key_exists($cliente, $conteggio))
        $conteggio[$cliente] = 1;
    //Se è già stato trovato in precedenza incremento il contatore di quel nominativo
    else
        $conteggio[$cliente]++;
}

//var_dump($conteggio);

//Scorro la meppa e estraggo solo i nominativi il cui conteggio è maggiore di 1
// La mappa conteggio è fatta ad esempio in questo modo

// |chiave             | valore            |
// |Giuseppe Garibaldo |  2                |
// |Annina Forti       |  1                |

/*Tutto il codice dalla riga 42 fino a qua si sarebbe potuto
sostituire con quest'unica riga

$conteggio = array_count_values($clienti);

Qual è la morale? Se stiamo facendo esercizi didattici va bene provare
ha costruire il codice partendo da elementi di base, se però il codice
deve essere fatto per applicazioni reali, conviene verificare prima
se non esiste già qualcosa, in questo caso una funzione di libreria
che fornisca già il risultato desiderato
*/

$risultato = array();

foreach ($conteggio as $key => $value) {
    if ($value > 1) {
        $risultato[] = $key;
    }
}

echo json_encode($risultato);

