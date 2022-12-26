<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $studenti
 */
?>

<?php $this->layout('home', ['titolo' => 'Elenco candidati']) ?>

<h1>Richiedi i dati dei candidati</h1>

<form action="candidates_by_state_year.php" method="post">
    <select name="states">
        <?php foreach ($stati as $stato):?>
            <option><?=$stato['state']?></option>
        <?php endforeach;?>
    </select>
    <br>
    <select name="years">
        <?php foreach ($anni as $anno):?>
            <option><?=$anno['year']?></option>
        <?php endforeach;?>
    </select>
    <br>
    <input type="submit">
</form>

