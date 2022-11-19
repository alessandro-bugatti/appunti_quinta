<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hamming</title>
</head>
<body>
<h1>Calcolo della distanza di Hamming</h1>


<?php
    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];

    if(strlen($s1) != strlen($s2)){
        echo "<p>La lunghezza delle stringhe è diversa</p>";
    }
    else{
        $errori = 0;
        for ($i = 0; $i < strlen($s1); $i++){
            if ($s1[$i] != 'A' &&
                $s1[$i] != 'C' &&
                $s1[$i] != 'G' &&
                $s1[$i] != 'T')
                $errori++;
        }
        for ($i = 0; $i < strlen($s2); $i++){
            if ($s2[$i] != 'A' &&
                $s2[$i] != 'C' &&
                $s2[$i] != 'G' &&
                $s2[$i] != 'T')
                $errori++;
        }
        if ($errori == 0){
            //Calcolo la distanza di Hamming
            $hamming = 0;
            for ($i = 0; $i < strlen($s1); $i++) {
                if ($s1[$i] != $s2[$i])
                    $hamming++;
            }
            echo "<p>La distanza di Hamming è " . $hamming . "</p>";
        }
        else{
            echo "<p>Errore di codifica del DNA</p>";
        }
    }


?>


</body>
</html>

