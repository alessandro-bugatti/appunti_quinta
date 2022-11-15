<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ricerca </title>
</head>
<body>

<?php

    $comune = $_POST['comune'];
    if ($comune == 'Brandico'){
        echo "<p>IL comune di " . $comune . " si trova in Via degli agnelli 28</p>";
    }
    else if ($comune == "Brescia"){
        echo "<p>Il comune di " . $comune . " si trova in Via del Broletto 1</p>";
    }
    else if ($comune == "Rovato"){
        echo "<p>Il comune di " . $comune . " si trova in via Garibaldi 22</p>";
    }
    else if ($comune == "Vobarno"){
        echo "<p>Il comune di " . $comune . " si trova in Vicolo Corto 11</p>";
    }
    else{
        echo "<p>Qualcosa è andato storto</p>";
    }
?>
</body>
</html>

