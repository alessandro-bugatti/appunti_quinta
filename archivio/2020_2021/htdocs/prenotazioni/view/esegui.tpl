<?php $this->layout('main',['argomento' => 'Tampone eseguito']); ?>

<p>
    Il tampone associato al codice <mark><?=$codice_univoco?></mark> è stato
    eseguito.
</p>
<p>
    Note: <?= $note ?>
</p>