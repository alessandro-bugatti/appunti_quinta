<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privacy</title>
</head>
<body>

<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    //var_dump è una funzione che permette di stampare il contenuto di variabile
    //anche complesse, fornendo tutta una serie di informazioni utili e quindi
    //permette la possibilità di semplici forme di debugging
    /*
     * echo '<pre>';
     * var_dump($_POST);
     * echo '</pre>';
     */
    echo "<p>Ciao " . $username . ", il tuo indirizzo email " . $email .
        " é stato registrato correttamente</p>";
    //if ($_POST['privacy'] == 'on') //così non si può fare perchè non è detto che la variabile ci sia
    if (isset($_POST['privacy'])){
        echo "<p>Hai accettato il trattamento dei dati personali</p>";
    }
    if (isset($_POST['marketing'])){
        echo "<p>Hai accettato le comunicazioni del marketing</p>";
    }
?>


</body>
</html>


