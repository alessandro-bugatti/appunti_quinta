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
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'alessandro' && $password == 'bugatti'){
        echo "<p>Ciao Alessandro, bentornato</p>";
    }
    else{
        echo "<p>Utente non riconosciuto</p>";

    }
?>
</body>
</html>

