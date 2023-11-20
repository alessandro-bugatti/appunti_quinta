<?php
    //Creiamo la stringa DSN (Data Source Name)
    $dsn = 'mysql:host=localhost;dbname=scuola';

    $pdo = new PDO($dsn, 'root','');

    $result = $pdo->query('SELECT * FROM studenti');

    echo '<ul>';
    foreach ($result as $row){
        echo '<li>' . $row['Nome'] . ' ' . $row['Cognome'] . '</li>';
    }
    echo '</ul>';


