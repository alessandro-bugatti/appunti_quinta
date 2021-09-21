<?php

require 'vendor/autoload.php';
include_once 'config.php';

use League\Plates\Engine;

//Viene creato l'oggetto per la gestione dei template
$templates = new Engine('./view','tpl');

//Query per recuperare i giorni disponibili
$sql = "SELECT gen_date AS giorno, prenotati  
        FROM (SELECT giorno, COUNT(*) as prenotati
            FROM prenotazioni
            GROUP BY giorno) AS B RIGHT JOIN (select * from 
        (select adddate('2021-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) gen_date from
        (select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
         (select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
         (select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
         (select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
         (select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
          where gen_date between CURRENT_DATE() and ADDDATE(CURRENT_DATE(), INTERVAL :n_giorni DAY)) AS A
          ON B.giorno = A.gen_date
        WHERE prenotati < :massimo_persone OR 
        prenotati IS NULL";

//Invio la query al server MySQL
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'n_giorni' => $GIORNI_PRENOTABILI,
    'massimo_persone' => $PERSONE_MASSIME_PER_GIORNO
]);

//Estraggo le righe di risposta che finiranno come vettori in $result
$result = $stmt->fetchAll();

//Rendo un template che mi visualizza la tabella
echo $templates->render('prenota_con_giorni', ['result' => $result]);