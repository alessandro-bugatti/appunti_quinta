<?php

$v[] = 1;
$v[] = 2;
$v[] = 3;

$v = [1,2,3];

$v['nome'] = 'Alex';
$v['cognome'] = 'Bugatti';

$v[] = 8;
$v[10] = 14;
/*
$v = [
    'nome' => 'Alex',
    'cognome' => 'Bugatti',
];
*/


//var_dump($v);

foreach ($v as $key => $elemento){
    echo 'Chiave: ' . $key . ' valore: ' . $elemento . "\n";
}