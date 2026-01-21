<?php
    /** Variabili iniettate
     * @var $players
     * @var $basepath
     * @var $altezza
     */
?>

<?php $this->layout('home', ['titolo' => 'Ricerca giocatori per cognome']) ?>

<form method="post">
    <input type="text" name="lastname">
    <input type="submit" value="Ricerca">
</form>


<table>
    <thead>
        <th>Nome</th>
        <th>Cognome</th>
        <th></th>
    </thead>
    <tbody>
    <?php foreach($players as $player): ?>
    <tr>
        <td><?=$this->e($player['first_name']);?></td>
        <td><?=$this->e($player['last_name']);?></td>
        <td><a href="<?=$this->e($basepath)?>/tennisti/<?=$this->e($player['player_id']);?>">Vai alla pagina del giocatore</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>