<?php
    require 'vendor/autoload.php';

    $template = new League\Plates\Engine('templates', 'tpl');

    //Creiamo la stringa DSN (Data Source Name)
    $dsn = 'mysql:host=localhost;dbname=scuola';

    $pdo = new PDO($dsn, 'root','');

    $result = $pdo->query('SELECT * FROM studenti');

    echo $template->render('index', [
        'studenti'=>$result
    ]);


