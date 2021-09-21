<?php $this->layout('main',['argomento' => 'Lista delle prenotazioni giornaliere']); ?>

<h5>Stai accedendo come <mark><?=$username?></mark></h5>
<table class="striped">
    <caption>Prenotazioni</caption>
    <thead>
    <tr>
        <th>Codice fiscale</th>
        <th>Codice univoco</th>
        <th>Documento d'identità</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($result as $row): ?>
        <tr>
            <td><?php echo $row['codice_fiscale'] ?></td>
            <td><?php echo $row['codice_univoco'] ?></td>
            <td><img src="<?=$row['documento'] ?>"></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
