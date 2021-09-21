<?php


require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

/**
 * Funzione che converte i dati prodotti dalla
 * query in un formato corretto per Canvas.js
 * @param $result
 * @return array dati point nel formato atteso
 */
function convert($result): array
{
    $dataPoints = array();
    foreach ($result as $row)
    {
        $dataPoints[] = ["label" => $row['giorno'], "y" => (int)$row['numero_persone']];
    }
    return $dataPoints;
}

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

//Se sei una persona che ha fatto il login
if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $inizio = $_POST['inizio'];
    $fine = $_POST['fine'];

    //Query per recuperare tutte le prenotazioni
    $sql = "SELECT giorno, count(*) as numero_persone 
            FROM prenotazioni
            WHERE giorno BETWEEN :inizio AND :fine
            GROUP BY giorno
            ORDER BY giorno";

    //Invio la query al server MySQL
    $stmt = $pdo->prepare($sql);
    $stmt->execute(
        [
            'inizio' => $inizio,
            'fine' => $fine
        ]
    );

    //Estraggo le righe di risposta che finiranno come vettori in $result
    $result = $stmt->fetchAll();

    $dataPoints = convert($result);

    echo $templates->render('grafico_prenotazioni', [
        'data_points' => $dataPoints,
        'username' => $username
    ]);
}
else
    echo $templates->render('utente_non_autorizzato');
