<?php

/*
 * Programma che restituisce l'intervento più costoso nei termini
 * del costo delle piante utilizzate con nominativo del cliente,
 * data dell'intervento e il costo totale
 */

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

$stmt = $pdo->query('SELECT cliente.nominativo, intervento.ID, intervento.data_effettuato, esemplare.costo, intervento_piante.quantita
FROM cliente, intervento, intervento_piante, esemplare
WHERE cliente.ID = intervento.id_cliente
AND intervento.ID = intervento_piante.id_intervento
AND intervento_piante.id_esemplare = esemplare.ID');

$piante_in_intervento = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    $piante_in_intervento[] = $row;
}

$costi = array();

for ($i = 0; $i < count($piante_in_intervento); $i++)
{
    //Per ogni riga del risultato della query estraggo l'ID
    $id = $piante_in_intervento[$i]['ID'];
    //Verifica se è la prima volta che lo incontro
    if (!array_key_exists($id, $costi))
    {
        $costi[$id]['costo'] = 0;
        for ($j = 0; $j < count($piante_in_intervento); $j++)
            if ($piante_in_intervento[$j]['ID'] == $id)
                $costi[$id]['costo'] += $piante_in_intervento[$j]['quantita'] * $piante_in_intervento[$j]['costo'];
        $costi[$id]['nominativo'] = $piante_in_intervento[$i]['nominativo'];
        $costi[$id]['data'] = $piante_in_intervento[$i]['data_effettuato'];
    }
}

$massimo = 0;
foreach ($costi as $costo)
    if ($costo['costo'] > $massimo)
    {
        $massimo = $costo['costo'];
        $risultato = $costo;
    }

//var_dump($risultato);


echo json_encode($risultato);

