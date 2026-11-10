<?php
/**
* @var $titolo
 * @var $persone
 */
?>

<?php $this->layout('layout', [
        'titolo' => $titolo
]); ?>
<main>

    <ul>
        <?php foreach ($persone as $key => $persona): ?>
            <li><a href="scheda.php?id=<?= $key ?>"><?= $persona['nome'] . ' ' . $persona['cognome']?></a></li>
        <?php endforeach; ?>
    </ul>

</main>