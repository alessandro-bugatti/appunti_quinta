<?php
require 'vendor/autoload.php';
use League\Plates\Engine;

// Create new Plates instance
$templates = new League\Plates\Engine('templates', 'phtml');

$capitale = $_POST['capitale'];
$interesse = $_POST['interesse'];
$anni = $_POST['anni'];

//Possibilità, ma non rispetta la filosofia di separazione
//controller - view
/*
$risultato = '';
for ($i = 1; $i <= $anni; $i++)
    $risultato .= 'Anno ' . $i . ': quota capitale bla bla bla <br>';
*/
$righe = array();

$capitale_rimasto = $capitale;
$quota_capitale = $capitale / $anni;
$totale = 0;

for ($i = 1; $i <= $anni; $i++)
{
    $righe[] = [
        'anno' => $i,
        'capitale' => $quota_capitale,
        'interesse' => $capitale_rimasto * $interesse / 100
    ];
    $totale += $quota_capitale + $capitale_rimasto * $interesse / 100;
    $capitale_rimasto -= $quota_capitale;

}

//var_dump($righe);

// Render a template
echo $templates->render('mutuo', [
    'righe' => $righe,
    'anni' => $anni,
    'capitale' => $capitale,
    'interesse' => $interesse,
    'totale' => $totale
]);

