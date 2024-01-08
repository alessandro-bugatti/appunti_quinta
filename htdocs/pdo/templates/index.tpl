<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <title>Document</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="text" name="nome" placeholder="Nome"
           value="<?=$studente['Nome']?>"><br>
    <input type="text" name="cognome" placeholder="cognome"
           value="<?=$studente['Cognome']?>"><br>
    <?php if(isset($studente['id'])):?>
    <input type="hidden" name="id"
           value="<?=$studente['id']?>"><br>
    <?php endif;?>
    <input type="submit">
</form>
    <h1>Elenco studenti</h1>
    <table>
        <?php foreach ($studenti as $studente):?>
            <tr>
                <td><?=$studente['Nome']?></td>
                <td><?=$studente['Cognome']?></td>
                <td><?=$studente['Classe']?></td>
                <td><a href="index.php?action=delete&id=<?=$studente['id']?>"><i class="icon icon-delete"></i></a></td>
                <td><a href="index.php?action=update&id=<?=$studente['id']?>"><i class="icon icon-edit"></i></a></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>