<?php
/**
 * @var $codici L'array che contiene i codici univoci generati dal controller
 * @var $nominativo Contiene il nominativo di chi ha comprato i biglietti
 */
?>

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


<?php foreach ($codici as $codice):?>
<div>
    <p>Nominativo: <?=$nominativo?></p>
    <p>Codice univoco: <?=$codice?></p>
</div>
<?php endforeach;?>

<?php if(count($biglietti) != 0):?>
<h2>Seconda versione Rocca</h2>
<?php endif; ?>

<?php foreach ($biglietti as $biglietto):?>
    <div>
        <p>Nominativo: <?=$biglietto['nominativo']?></p>
        <p>Codice univoco: <?=$biglietto['codice']?></p>
    </div>
<?php endforeach;?>

</body>
</html>