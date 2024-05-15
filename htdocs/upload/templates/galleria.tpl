<?php $this->layout('home', ['title' => 'Inserimento nuova immagine']) ?>



<h1>Nuova immagine</h1>
<?php if($successo == true):?>
<div class="toast toast-success">
    Immagine caricata correttamente.
</div>
<?php endif;?>

<h3>Scegli l'immagine da inviare</h3>
<!-- L'attributo enctype è necessario per poter inviare i file -->
<form enctype="multipart/form-data" action="index.php" method="post" >

    <!-- MAX_FILE_SIZE serve a fare un controllo lato client
     sulla dimensione massima del file da inviare. Siccome è lato
     client, poi bisognerebbe farlo anche lato server. In php.ini
     esiste il valore equivalente lato server -->
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="immagine"></label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="file"
                   id="immagine" name="immagine">
        </div>

    </div>
    <p><input type="submit" value="Invia l'immagine"></p>

</form>

<h1>Immagine inviate</h1>
<div class = "columns">
<?php foreach ($immagini as $immagine):?>
    <div class="column col-4 col-xl-6 col-md-12 bg-gray" style="margin-bottom: 30px;">
        <div class="tile">
            <img class="img-responsive" src="immagini/<?=$immagine['name']?>">
        </div>
    </div>
<?php endforeach; ?>
</div>
    