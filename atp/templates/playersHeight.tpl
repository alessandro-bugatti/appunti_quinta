<?php $this->layout('home', ['titolo' => 'ATP players con altezza']) ?>

<h2>Giocatori</h2>

<table>
    <thead>
        <th>Nome</th>
        <th>Cognome</th>
    </thead>
    <tbody>
    <?php foreach($players as $player): ?>
    <tr>
        <td><?=$this->e($player['first_name']);?></td>
        <td><?=$this->e($player['last_name']);?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>