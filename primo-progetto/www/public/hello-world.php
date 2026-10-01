<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >
    <meta name="viewport" content="width=device-width, initial-scale=1">
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