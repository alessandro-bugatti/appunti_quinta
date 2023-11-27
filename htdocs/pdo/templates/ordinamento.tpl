<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Elenco studenti</h1>
    <ul>
        <li><a href="ordinamento.php?ordina=cognome">Ordina per cognome</a></li>
        <li><a href="ordinamento.php?ordina=nome">Ordina per nome</a></li>
        <li><a href="ordinamento.php?ordina=classe">Ordina per classe</a></li>
    </ul>
    <table>
        <?php foreach ($studenti as $studente):?>
            <tr>
                <td><?=$studente['Nome']?></td>
                <td><?=$studente['Cognome']?></td>
                <td><?=$studente['Classe']?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>