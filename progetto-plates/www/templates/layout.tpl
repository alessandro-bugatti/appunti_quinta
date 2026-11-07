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

    <title><?= $titolo?></title>
</head>
<body>

<header>
    <h1><?=$titolo?></h1>
</header>

<?= $this->section('content')?>

<footer>
    Progetti di Informatica con Plates
</footer>
</body>
</html>