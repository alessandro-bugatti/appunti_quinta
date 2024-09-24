<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bus ticket</title>
</head>
<body>
<h1>Biglietti acquistati!</h1>
    <p>Il costo totale dei biglietti è <?=$costo_totale?></p>
    <?php foreach ($tickets as $ticket):?>
        <div>
            <h1><?=$ticket['nominativo']?></h1>
            <p><strong><?=$ticket['tipo']?> </strong></p>
            <p><strong>Zona</strong> <?=$ticket['zona']?></p>

            <p><strong>Costo</strong>: <?=$ticket['costo']?> €</p>
        </div>
    <hr>
    <?php endforeach;?>
</form>
<a href="bus_ticket.php">Acquista altri biglietti</a>
</body>
</html>