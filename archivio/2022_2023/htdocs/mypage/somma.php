<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    //in PHP le variabili hanno un $ davanti
    //Non hanno bisogno di essere dichiarate, il tipo
    //viene dedotto dal contesto
    $primo = $_POST['primo']; //$_POST è un superarray globale
    $secondo = $_POST['secondo'];
    $somma = $primo + $secondo;
    echo $somma;
?>

</body>
</html>


