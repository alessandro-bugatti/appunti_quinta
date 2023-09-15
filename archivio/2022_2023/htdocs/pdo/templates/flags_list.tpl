<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $flags
 */
?>

<?php $this->layout('home', ['titolo' => 'Stati']) ?>

<h1>Flags list</h1>

<ul>

    <?php foreach ($flags as $flag):?>
    <li>
        <a href="state_selected.php?state=<?=$flag['state_po']?>">
            <img src="https://flagcdn.com/40x30/us-<?=strtolower($flag['state_po'])?>.png" alt="<?=$flag['state_po']?>">
        </a>
    </li>
    <?php endforeach;?>
</ul>

