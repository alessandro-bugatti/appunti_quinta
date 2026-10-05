<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <!-- Questa parte aggiunge stile usando HTML semantico a costo zero -->
    <!-- Usando header, main e footer HTML, viene centrato il layout automaticamente -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >

    <title>Tabelline</title>
</head>
<body>

<main>
<h1>Tabelline</h1>

<ul>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo '<li><a href="tabellina.php?numero=' . $i . '"> Tabellina numero ' . $i .'</a ></li>';
    }
    ?>
</ul>

</main>

</body>
</html>