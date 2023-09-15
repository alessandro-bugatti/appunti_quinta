<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hamming</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
</head>
<body>
<div class="container grid-lg">
    <h1>Calcolo della distanza di Hamming</h1>


    <?php
    function hamming(string $s1, string $s2): int
    {
        $hamming = 0;
        for ($i = 0; $i < strlen($s1); $i++) {
            if ($s1[$i] != $s2[$i])
                $hamming++;
        }
        return $hamming;
    }

    function render_errors(string $s1): string
    {
        $errori = "";
        for ($i = 0; $i < strlen($s1); $i++) {
            if (preg_match("/[^ACTG]/", $s1[$i]) == 1)
                $errori .= '^';
            else
                $errori .= ' ';
        }
        return $errori;
    }

    function render_differences(string $s1, string $s2): string
    {
        $differenze = "";
        for ($i = 0; $i < strlen($s1); $i++) {
            if ($s1[$i] != $s2[$i])
                $differenze .= '^';
            else
                $differenze .= ' ';
        }
        return $differenze;
    }

    $s1 = $_POST['s1'];
    $s2 = $_POST['s2'];

    if (strlen($s1) != strlen($s2)) {
        echo "<p>La lunghezza delle stringhe è diversa</p>";
    } else {
        $errori = false;
        if (preg_match("/[^ACTG]/", $s1) == 1) //c'è un errore
        {
            echo "<h3>Prima stringa</h3><pre>" . $s1 . "\n" . render_errors($s1) . "</pre>";
            $errori = true;
        }
        if (preg_match("/[^ACTG]/", $s2) == 1) //c'è un errore
        {
            echo "<h3>Seconda stringa</h3><pre>" . $s2 . "\n" . render_errors($s2) . "</pre>";
            $errori = true;
        }
        if (!$errori) {
            //Calcolo la distanza di Hamming
            $hamming = hamming($s1, $s2);
            echo "<p>La distanza di Hamming è " . $hamming . "</p>";
            echo "<pre>" . $s1 . "\n" . $s2 . "\n" . render_differences($s1, $s2) . "</pre>";

        } else {
            echo "<p>Errore di codifica del DNA</p>";
        }
    }


    ?>

</div>
</body>
</html>

