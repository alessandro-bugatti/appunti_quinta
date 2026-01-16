<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$this->e($titolo)?></title>
    <!-- Pico.css classless -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
</head>
<body>
<main>
    <h1>Sito ATP</h1>
<!--Questa parte sarà sempre così e serve a includere
il template che contiene il contenuto vero e proprio-->
<?=$this->section('content')?>
</main>

<footer>
    <p><a href="/atp">Torna alla pagina principale</a></p>
    <p>
        2026 – Esempio di utilizzo dei template<br>
        <small>Made with Plates</small>
    </p>
</footer>
</body>
</html>

