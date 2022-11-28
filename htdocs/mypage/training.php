<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Training</title>
</head>
<body>

<?php
    function stato_fisico(int $bmi):string{
        if ($bmi < 18.5)
            return 'Sottopeso';
        if ($bmi < 24.9)
            return 'Normopeso';
        if ($bmi < 29.9)
            return 'Sovrappeso';
        return 'Obeso';
    }



    $durata_allenamenti = [
      'Normopeso' => [
              'Corsa' => 30,
              'Nuoto' => 60,
              'Palestra' => 45
      ],

      'Sovrappeso' => [
              'Corsa' => 40,
          'Nuoto' => 75,
          'Palestra' => 60
      ]
    ];
    echo '<h2>Stampa con var_dump per vedere il funzionamento della mappa</h2>';
    echo '<h2>Stampa mappa completa</h2>';
    echo '<pre>';
    var_dump($durata_allenamenti);
    echo '</pre>';
    echo '<h2>Stampa mappa per una chiave</h2>';
    echo '<pre>';
    var_dump($durata_allenamenti['Normopeso']);
    echo '</pre>';

    echo '<h2>Stampa valore specifico</h2>';
    echo '<pre>';
    var_dump($durata_allenamenti['Normopeso']['Corsa']);
    echo 'Valore: ' . $durata_allenamenti['Normopeso']['Corsa'];
    echo '</pre>';



$nominativo = $_POST['nominativo'];
    $altezza = $_POST['altezza'];
    $peso = $_POST['peso'];
    $n_allenamenti = $_POST['n_allenamenti'];
    $attivita = $_POST['attivita'];

    echo '<h2>Benvenuto ' . $nominativo . '</h2>';
    echo "<h2>Benvenuto $nominativo </h2>"; //con doppie virgolette, meglio evitare
    $BMI = $peso / ($altezza * $altezza);
    echo '<p>Il tuo BMI è ' . $BMI . ' e quindi sei ' .
        stato_fisico($BMI) .
    '</p>';

    $durata_iniziale = $durata_allenamenti[stato_fisico($BMI)][$attivita]; //da terminare

    echo '<p>Durata del primo allenamento ' . $durata_iniziale . '</p>';

    echo '<p>Da completare</p>';

?>

</body>
</html>


