<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $candidati
 */
?>

<?php $this->layout('home', ['titolo' => 'Stati']) ?>

<h1>Esempio candidati</h1>

<ul>
    <?php foreach ($candidati as $candidato):?>
        <li><?=$candidato['candidate']?></li>
    <?php endforeach;?>
</ul>

