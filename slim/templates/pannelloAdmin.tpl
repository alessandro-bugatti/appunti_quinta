<?php
/** @var $prodotti */
?>
<?php $this->layout('home', ['title' => 'Prodotti']) ?>

<h1>Pannello di amministrazione</h1>
<p>
    <a href="<?=$base_path?>/pannelloAdmin/prodotto" class="btn btn-primary">Aggiungi un nuovo articolo</a>
</p>
<table class="table">
    <?php foreach($prodotti as $prodotto):?>
        <tr>
            <td><?=$prodotto['nome']?></td>
            <td><?=$prodotto['descrizione']?></td>
            <td><?=$prodotto['prezzo']?></td>
        </tr>
    <?php endforeach;?>
</table>