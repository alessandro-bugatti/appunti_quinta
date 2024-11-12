<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Il mio negozio</title>
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-exp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/spectre.css/dist/spectre-icons.min.css">
    <meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, user-scalable=0;"/>
</head>
<body>
    <h1>Il mio negozio</h1>

    <h2>Prodotti</h2>

    <table class="table">
        <thead>
            <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prodotti as $prodotto): ?>

            <tr>
                <td><?=$prodotto['nome']?></td>
                <td><?=$prodotto['descrizione']?></td>
                <td><?=$prodotto['prezzo']?> €</td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>