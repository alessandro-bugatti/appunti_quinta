<?php $this->layout('main',['argomento' => 'Esegui il tampone']); ?>

<h5>Stai accedendo come <mark><?=$username?></mark></h5>
<form action="esegui.php" method="post">
    <fieldset>
        <legend>Inserisci le informazioni</legend>
        <label for="codice">Codice univoco</label>
        <input type="text" id="codice" placeholder="Codice univoco" name="codice">
        <label for="note">Note</label>
        <textarea id="note" placeholder="Note" name="note"></textarea>
        <input type="submit" value="Registra il tampone">
    </fieldset>
</form>