<?php
/** @var $prodotti */
?>
<?php $this->layout('home', ['title' => 'Prodotti']) ?>

<h1>Lista dei prodotti</h1>

<table class="table">
    <?php foreach($prodotti as $prodotto):?>
        <tr>
            <td><?=$prodotto['nome']?></td>
            <td><?=$prodotto['descrizione']?></td>
            <td><?=$prodotto['prezzo']?></td>
        </tr>
    <?php endforeach;?>
</table>