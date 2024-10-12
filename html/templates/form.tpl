<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<h1>Esempio di tutti i campi indispensabili di un form</h1>
<form action="controller_form.php" method="post">
    <p>Campo di testo <input type="text" name="testo"></p>

    <p>
        Menù a tendina
        <select name="tendina">
            <option>
                Brescia
            </option>
            <option>
                Bergamo
            </option>
            <option>
                Bologna
            </option>
        </select>
    </p>

    <p>
        Checkbox1 <input type="checkbox" name="checkbox1"><br>
        Checkbox2 <input type="checkbox" name="checkbox2">
    </p>

    <p>
        Radio1 <input type="radio" name="radio" value="1"><br>
        Radio2 <input type="radio" name="radio" value="2"><br>
        Radio3 <input type="radio" name="radio" value="3">
    </p>

    <p>
        Area di testo<br>
        <textarea name="areaTesto"></textarea>
    </p>

    <p>
        Data di nascita <input type="date" name="data">
    </p>

    <p>
        Password <input type="password" name="password">
    </p>

    <p>
        Numero studenti <input type="number" name="studenti">
    </p>

    <button>Invia</button>

</form>

<pre>
    <?php var_dump($dati) ?>
</pre>

<p>IL campo di testo contiene <?=$testo?> </p>

<p>
    <?php if ($arrivato): ?>
    Il checkbox1 è stato selezionato
    <?php else: ?>
    IL checkbox1 non è stato selezionato
    <?php endif; ?>
</p>

<pre>
<?=$dati['areaTesto']?>
</pre>

</body>
</html>