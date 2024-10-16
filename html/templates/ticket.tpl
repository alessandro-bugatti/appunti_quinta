<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
</head>
<body>
<form action="controller_ticket.php" method="post">
    Nominativo <input type="text" name="nominativo"><br>
    <select name="n_biglietti">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <button>Invia</button>
</form>

<pre>
    <?php foreach ($codici as $codice):?>

    <?php endforeach;?>
</pre>
</body>
</html>