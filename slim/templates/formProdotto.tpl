<?php
/** @var $prodotti */
?>
<?php $this->layout('home', ['title' => 'Inserimento prodotto']) ?>

<h1>Inserimento di un nuovo prodotto</h1>

<form enctype="multipart/form-data" class="form-horizontal" action="<?=$base_path?>/admin/prodotto<?=isset($prodotto['id'])?'/'.$prodotto['id']:''?>" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="name">Nome</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="text" id="name" placeholder="Nome" name="nome">
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="descrizione">Descrizione</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="text" id="descrizione" placeholder="Descrizione" name="descrizione">
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="prezzo">Prezzo</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="number" step="0.01" id="prezzo" placeholder="Prezzo" name="prezzo">
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label">Genere</label>
        </div>
        <div class="col-9 col-sm-12">
            <select class="form-select" name="genere">
                <option>Donna</option>
                <option>Uomo</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="immagine"></label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="file"
                   id="immagine" name="immagine">
        </div>

    </div>
    <div class="form-group">
    <div class="col-3 col-ml-auto">
        <button class="btn btn-primary" type="submit" style="width:100%">Aggiungi un prodotto</button>
    </div>
    </div>
    <!-- form structure -->
</form>