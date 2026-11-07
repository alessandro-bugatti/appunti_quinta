<?php $this->layout('layout',[
        'titolo' => $titolo,
]); ?>
<main>
    <h1>Tabellina</h1>

    <ul>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <li><?= $numero?> x <?= $i?> = <?= $numero * $i?></li>
        <?php endfor; ?>
    </ul>
</main>