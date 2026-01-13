<?php $this->layout('home', ['titolo' => 'ATP player']) ?>

<?php if(isset($first_name)):?>

<h2><?=$this->e($first_name)?> <?=$this->e($last_name)?></h2>

<p>
    <strong>Luogo di nascita: </strong> <?=$this->e($birthplace)?>
</p>

<p>
    <strong>Altezza: </strong> <?=$this->e($height_cm)?>
</p>

<p>
    <a href="<?=$this->e($player_url)?>">Vai alla pagina ATP del giocatore</a>
</p>

<?php else:?>

<h2>Giocatore non presente</h2>

<?php endif;?>