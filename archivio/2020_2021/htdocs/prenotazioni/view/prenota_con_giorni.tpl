<?php $this->layout('main',['argomento' => 'Prenota con giorni disponibili']); ?>

    <p>Inserisci i tuoi dati per prenotare un tampone</p>
    <form action="prenota.php" method="post">
        <fieldset>
            <legend>Inserisci la prenotazione</legend>
            <label for="codice">Codice fiscale</label>
            <input type="text" id="codice" placeholder="Codice fiscale" name="codice">

            <label for="giorno">Giorno</label>
            <select id="giorno" placeholder="Giorno scelto" name="giorno">
                <?php foreach($result as $row): ?>
                    <option value = "<?= $row['giorno'] ?>" ><?= $row['giorno'] ?></option>
                <?php endforeach ?>
            </select>

            <input type="submit" value="Invia la tua richiesta">
        </fieldset>
    </form>
