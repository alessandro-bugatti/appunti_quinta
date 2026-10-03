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

    <title>Hello world</title>
</head>
<body>

<main>
<h2>
    <?php
        echo "Hello " . $_GET['nome'] . "!";
    ?>
</h2>
<p>Questo è il primo programma vero.</p>
</main>

</body>
</html>