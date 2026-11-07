<?php $this->layout('layout', [
        'titolo' => $titolo
]); ?>
<main>

    <ul>
        <?php foreach ($persone as $persona): ?>
            <li><?= $persona ?></li>
        <?php endforeach; ?>
    </ul>

</main>