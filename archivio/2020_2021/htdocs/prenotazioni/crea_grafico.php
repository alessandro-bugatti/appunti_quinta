<?php


require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view', 'tpl');

$dataPoints = array(
    array("x"=> 10, "y"=> 41),
    array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
    array("x"=> 30, "y"=> 50),
    array("x"=> 40, "y"=> 45),
    array("x"=> 50, "y"=> 52),
    array("x"=> 60, "y"=> 68),
    array("x"=> 70, "y"=> 38),
    array("x"=> 80, "y"=> 280, "indexLabel"=> "Highest"),
    array("x"=> 90, "y"=> 52),
    array("x"=> 100, "y"=> 60),
    array("x"=> 110, "y"=> 36),
    array("x"=> 120, "y"=> 49),
    array("x"=> 130, "y"=> 41)
);

//Query per recuperare tutte le prenotazioni
$sql = "SELECT * FROM prenotazioni ORDER BY codice_univoco";

//Invio la query al server MySQL
$stmt = $pdo->query($sql);

//Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetchAll();

$dataPoints2 = array();
foreach ($result as $row)
{
        $dataPoints2[] = ["label" => $row['giorno'], "y" => 7];
}

echo $templates->render('graph', [
        'data_points' => $dataPoints2
        ]);
