<?php $this->layout('layout', [
        'titolo' => $titolo
]); ?>
<main>
    <h1>Tabelline</h1>

    <ul>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <li><a href="tabellina.php?numero=<?= $i ?>"> Tabellina numero <?= $i ?></a ></li>
        <?php endfor; ?>
    </ul>

</main>