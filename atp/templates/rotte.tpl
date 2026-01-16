<?php
/** Variabili iniettate
 * @var $basepath
 */
?>

<?php $this->layout('home', ['titolo' => 'No data']) ?>

<h2>Esercizi sul database del tennis, solo metodo GET</h2>

<p>Spiegazione del contenuto</p>

<p><a href="<?=$this->e($basepath)?>/tennisti/a006">Pagina che mostra i dati del tennista a006</a></p>

<p><a href="<?=$this->e($basepath)?>/tennisti/altezza/200">Pagina che mostra i dati dei tennisti alti due metri o più</a></p>

