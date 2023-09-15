<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $flags
 */
?>

<?php $this->layout('home', ['titolo' => 'Elenco informazioni']) ?>

<h1>Elenco degli anni</h1>

<ul>

    <?php foreach ($years as $year):?>
    <li>
        <a href="candidates.php?year=<?=$year['year']?>&candidate=<?=$year['candidate']?>">
            <?=$year['year']?>
        </a>
    </li>
    <?php endforeach;?>
</ul>

