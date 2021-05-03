<?php $this->layout('main',['argomento' => 'Registrazione effettuata']); ?>

<p>
    Registrazione effettuata correttamente. Il nuovo account è
    <mark><?=$username?></mark> ed è stato registrato da <mark class="tertiary">
    <?= $creatore_username ?></mark>.
</p>
<p>
    Per accedere vai alla pagina di login.
</p>
