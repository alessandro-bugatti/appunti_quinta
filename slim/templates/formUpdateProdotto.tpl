<?php
/** @var $prodotto
 * @var $base_path
 */
?>
<?php $this->layout('home', ['title' => 'Inserimento prodotto']) ?>

<h1>Modifica di un prodotto</h1>

<form class="form-horizontal" method="post" action="<?=$base_path?>/pannelloAdmin/prodotto/<?=$prodotto['id']?>/update" enctype="multipart/form-data">
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="name">Nome</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="text" id="name" placeholder="Nome" name="nome" value="<?=$prodotto['nome']?>" required>
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="descrizione">Descrizione</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="text" id="descrizione" placeholder="Descrizione" name="descrizione" value="<?=$prodotto['descrizione']?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label" for="prezzo">Prezzo</label>
        </div>
        <div class="col-9 col-sm-12">
            <input class="form-input" type="number" step="0.01" id="prezzo" placeholder="Prezzo" name="prezzo" value="<?=$prodotto['prezzo']?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-3 col-sm-12">
            <label class="form-label">Genere</label>
        </div>
        <div class="col-9 col-sm-12">
            <select class="form-select" name="genere">
                <?php if($prodotto['genere']=="Donna"):?>
                    <option selected>Donna</option>
                    <option>Uomo</option>
                <?php else:?>
                    <option>Donna</option>
                    <option selected>Uomo</option>
                <?php endif;?>
            </select>
        </div>
    </div>
    <div class="form-group">
    <div class="col-3 col-ml-auto">
        <button class="btn btn-primary" type="submit" style="width:100%">Aggiorna</button>
    </div>
    </div>
    <!-- form structure -->
</form>