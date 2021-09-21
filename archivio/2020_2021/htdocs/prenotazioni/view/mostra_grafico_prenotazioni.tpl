<?php $this->layout('main',['argomento' => 'Lista di tutte le prenotazioni']); ?>

<h5>Stai accedendo come <mark><?=$username?></mark></h5>
<p>Scegli l'intervallo per visualizzare le prenotazioni giornaliere</p>
<form action="grafico_prenotazioni.php" method="post">
    <fieldset>
        <legend>Data inizio e fine</legend>
        <label for="inizio">Data inizio</label>
        <input type="date" id="inizio" placeholder="Data inizio" name="inizio">
        <label for="fine">Giorno</label>
        <input type="date" id="fine" placeholder="Data fine" name="fine">
        <input type="submit" value="Mostra i grafici">
    </fieldset>
</form>