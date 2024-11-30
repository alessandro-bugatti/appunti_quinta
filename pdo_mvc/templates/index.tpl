<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esempio PDO MVC</title>
</head>
<body>
<h1>Esempio PDO MVC</h1>
<h2>Tutti i prodotti</h2>
<ul>
<?php foreach ($prodotti as $prodotto): ?>
    <li><?=$prodotto['nome']?></li>
<?php endforeach;?>
</ul>

<p><a href="index.php?genere=maschio">Abbigliamento maschile</a></p>
<p><a href="index.php?genere=femmina">Abbigliamento femminile</a></p>

<?php if($genere != null):?>

<?php if ($genere == 'Uomo'):?>
    <h3>Prodotti di abbigliamento maschile</h3>
<?php else:?>
    <h3>Prodotti di abbigliamento femminile</h3>
<?php endif;?>


<ul>
    <?php foreach ($prodottiPerGenere as $prodotto): ?>
        <li><?=$prodotto['nome']?></li>
    <?php endforeach;?>
</ul>

<?php endif;?>

</body>
</html>