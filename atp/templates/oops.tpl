<?php
/** @var $base_path
 * @var $error
 */
?>
<?php $this->layout('home', ['titolo' => 'ATP']) ?>

    <h1>Oops, qualcosa è andato così storto...</h1>
    <h2>... che non abbiamo la più pallida idea di cosa sia successo ...</h2>
    <div class="columns">
        <div class="col-4 col-mx-auto"><img src="<?=$base_path?>/img/oops.webp" class="img-responsive" alt="Something went wrong">
        </div>
    </div>
<!--<div class="code">Errore: <?=$error?></div>-->

