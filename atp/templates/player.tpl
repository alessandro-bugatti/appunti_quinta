<?php
    /** Variabili iniettate
     * @var $first_name
     * @var $last_name
     * @var $player_id
     * @var $birthplace
     * @var $height_cm
     * @var $player_url
     *
     */
?>

<?php $this->layout('home', ['titolo' => 'ATP player']) ?>

<h2><?=$this->e($first_name)?> <?=$this->e($last_name)?></h2>

<p><img src="https://www.atptour.com/-/media/alias/player-gladiator-headshot/<?=$this->e($player_id)?>" alt="Immagine di <?=$this->e($first_name)?> <?=$this->e($last_name)?>"></p>


<p>
    <strong>Luogo di nascita: </strong> <?=$this->e($birthplace)?>
</p>



<p>
    <strong>Altezza: </strong> <?=$this->e($height_cm)?>
</p>

<p>
    <a href="<?=$this->e($player_url)?>">Vai alla pagina ATP del giocatore</a>
</p>
