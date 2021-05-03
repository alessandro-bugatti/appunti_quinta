<?php $this->layout('main',['argomento' => 'Prenota il tuo tampone']); ?>

    <p>Inserisci i tuoi dati per prenotare un tampone</p>
    <form action="prenota.php" method="post">
        <fieldset>
            <legend>Inserisci la prenotazione</legend>
            <label for="codice">Codice fiscale</label>
            <input type="text" id="codice" placeholder="Codice fiscale" name="codice">
            <label for="giorno">Giorno</label>
            <input type="date" id="giorno" placeholder="Giorno scelto" name="giorno">
            <input type="submit" value="Invia la tua richiesta">
        </fieldset>
    </form>
