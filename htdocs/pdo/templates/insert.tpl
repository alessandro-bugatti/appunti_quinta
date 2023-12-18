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
<form action="insert.php" method="post">
    <input type="text" name="nome" placeholder="Nome"><br>
    <input type="text" name="cognome" placeholder="cognome"><br>
    <input type="submit">
</form>
    <h1>Elenco studenti</h1>
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