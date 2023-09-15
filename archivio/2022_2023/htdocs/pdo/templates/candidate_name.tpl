<?php
/**
 * Questo commento serve solo a eliminare l'indicazione di errore
 * da parte di PHPStorm per la variabile $studenti
 * @var $studenti
 */
?>

<?php $this->layout('home', ['titolo' => 'Scelta candidato']) ?>

<h1>Candidato scelto</h1>

<form action="candidate_links_year.php" method="post">
    <input type="text" name="candidate" placeholder="Candidate">
    <br>
    <input type="submit">
</form>

