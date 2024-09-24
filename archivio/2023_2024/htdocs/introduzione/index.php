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

<form action="" method="post">
    <input type="text" name="a">
    <input type="text" name="b">
    <input type="submit" value="Invia">
</form>

<?php
/**
 * PHP è un linguaggio di scripting
 * Non è tipizzato
 * Gira lato server
 * Produce "qualcosa" che il client utilizza per fornire il servizio
 * La sintassi prende spunto da C e bash
 */

//Una variabile esiste nel momento in cui si fa il primo assegnamento
//ed é prefissa dal simbolo $

$a = $_POST['a'];
$b = $_POST['b'];
$c = $a * $b;


echo '<p>Il risultato della moltiplicazione tra ' . $a
    . ' e ' . $b . ' è ' . $c . '</p>';
?>
</body>
</html>

</body>
</html>

