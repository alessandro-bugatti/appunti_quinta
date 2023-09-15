<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $studenti
 */
?>

<?php $this->layout('home', ['titolo' => 'Stati']) ?>

<h1>Esempio con gli stati americani</h1>

<ul>
    <?php foreach ($stati as $stato):?>
        <li><?=$stato['state']?> (<?=$stato['state_po']?>)</li>
    <?php endforeach;?>
</ul>

