<?php
/** @var $genere
 * @var $prodotti
 */
?>
<?php $this->layout('home', ['title' => 'Negozio']) ?>

    <h1>Esempio negozio con pattern MVC</h1>
    <h2>Lista dei prodotti: <?=$genere?></h2>
    <ul>
    <?php foreach ($prodotti as $prodotto): ?>
        <li><a href="<?=$base_path?>/negozio/prodotto/<?=$prodotto['id']?>"> <?=$prodotto['nome']?></a>: <i><?=$prodotto['descrizione']?></i></li>
    <?php endforeach;?>
    </ul>
