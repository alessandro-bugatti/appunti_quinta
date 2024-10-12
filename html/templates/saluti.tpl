<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Saluti</title>
</head>
<body>
<h1>Saluti</h1>
<form action="controller_saluti.php" method="post">
    <p>Nome <input type="text" name="nome"></p>
    <p>Cognome <input type="text" name="cognome"></p>

    <button>Invia</button>

</form>

<p><?php echo $benvenuto?></p>

</body>
</html>