<?php
/** @var $prodotti
 * @var $base_path
 * */
?>
<?php $this->layout('home', ['title' => 'Prodotti']) ?>

<h1>Pannello di amministrazione</h1>
<p>
    <a href="<?=$base_path?>/pannelloAdmin/prodotto" class="btn btn-primary">Aggiungi un nuovo articolo</a>
</p>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <?php foreach($prodotti as $prodotto):?>
        <tr>
            <td><?=$prodotto['nome']?></td>
            <td><?=$prodotto['descrizione']?></td>
            <td><?=$prodotto['prezzo']?></td>
            <td><a href="<?=$base_path?>/pannelloAdmin/prodotto/<?=$prodotto['id']?>/update" class="icon icon-edit"></a></td>
            <td><a href="<?=$base_path?>/pannelloAdmin/prodotto/<?=$prodotto['id']?>/delete" class="icon icon-delete" onclick="return confirm('Sicuro di eliminare il prodotto?')"></a></td>
        </tr>
    <?php endforeach;?>
</table>