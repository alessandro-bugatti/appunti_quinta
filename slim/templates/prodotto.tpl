<?php
/**
 * @var $prodotto
 * @var $base_path
 */
?>
<?php $this->layout('home', ['title' => 'Negozio']) ?>

    <h1>Esempio negozio con pattern MVC</h1>
    <h2><?=$prodotto['nome']?></h2>

<div class="card">
    <div class="card-image">
        <img src="<?=$base_path?>/images/<?=$prodotto['image']?>"
             class="img-responsive" alt="<?=$prodotto['nome']?>">
    </div>
    <div class="card-header">
        <div class="card-title h5"><?=$prodotto['nome']?></div>
        <div class="card-subtitle text-gray"><?=$prodotto['prezzo']?> €</div>
    </div>
    <div class="card-body">
        <?=$prodotto['descrizione']?>
    </div>
    <div class="card-footer">
        <a href="<?=$base_path?>/negozio">Torna al negozio</a>
    </div>
</div>
