<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcolatore distanza di Hamming</title>
</head>
<body>
    <h1>Calcolatore distanza di Hamming</h1>
    <h2>Risultato</h2>
    <?php
        $stringa1 = $_POST['stringa1'];
        $stringa2 = $_POST['stringa2'];
        if (strlen($stringa1) != strlen($stringa2)) {
            echo '<p>Il calcolo della distanza di Hamming è possibile perché le due stringhe non hanno la stessa lunghezza.</p>';
        } else {
            $hamming = 0;
            for ($i = 0; $i < strlen($stringa1); $i++) {
                if ($stringa1[$i] != $stringa2[$i])
                    $hamming++;
            }
            echo '<p>La distanza di Hamming tra le due stringhe è di ' . $hamming . '.</p>';
        }
    ?>
</body>
</html>
