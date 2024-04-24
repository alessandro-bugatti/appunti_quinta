<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $valutazioni
 * @var $displayed_name
 */
?>

<?php $this->layout('home', ['titolo' => 'Esempio autenticazione']) ?>

<header class="navbar">
    <section class="navbar-section">

    </section>

    <section class="navbar-section">
        <span class="label label-rounded label-primary m-2">
            Hello <?=$displayed_name?>
        </span>
        <button class="btn btn-action tooltip tooltip-bottom" data-tooltip="Logout">
            <a href="index.php?action=logout">
                <i class="icon icon-share"></i>
            </a>
        </button>
    </section>
</header>

<h1>I tuoi voti</h1>

<table>
    <?php foreach ($valutazioni as $valutazione): ?>

    <tr>
        <td><?=$valutazione['voto']?></td>
        <td><?=$valutazione['materia']?></td>
        <td><?=$valutazione['data']?></td>
    </tr>

    <?php endforeach;?>

</table>


<a href="index.php">Torna alla pagina d'ingresso</a>
