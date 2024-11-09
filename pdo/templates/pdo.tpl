<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Primo esempio PDO</title>
</head>
<body>
<h1>Primo esempio PDO</h1>

<ol>
    <?php foreach ($studenti as $studente): ?>
        <li><?=$studente['nome']?> <?=$studente['cognome']?></li>
    <?php endforeach; ?>
</ol>

</body>
</html>