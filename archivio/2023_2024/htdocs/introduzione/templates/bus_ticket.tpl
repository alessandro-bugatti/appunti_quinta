<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bus ticket</title>
</head>
<body>
<form action="bus_ticket.php" method="post">
    <div>
            <input type="text" placeholder="Cognome nome" name="nominativo">
        </div>

        <div>
            <p>Zona</p>
            <select name="zona">
                <option >1</option>
                <option >2</option>
                <option >3</option>
            </select>
    </div>
        <p>Tipo</p>
        <div>
            <input type="radio" name="tipo" value="1" checked>Corsa semplice<br>
            <input type="radio" name="tipo" value="2">Biglietto orario<br>
            <input type="radio" name="tipo" value="3">Biglietto giornaliero<br>
        </div>

    <div>
        <p>Numero biglietti</p>
        <select name="quanti">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
        </select>
    </div>

    <p><input type="submit" value="Acquista"></p>

</form>

</body>
</html>