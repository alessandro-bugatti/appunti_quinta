<?php
/**  @var $title
 *   @var $base_path

 */ ?>

<html lang="it">
<head>
    <link rel="stylesheet" href="<?=$base_path?>/css/spectre.min.css">
    <link rel="stylesheet" href="<?=$base_path?>/css/spectre-exp.min.css">
    <link rel="stylesheet" href="<?=$base_path?>/css/spectre-icons.min.css">
    <title><?=$title?></title>
</head>
<body>

<div class="container grid-lg">

    <header class="navbar">
        <section class="navbar-section">
            <a href="<?=$base_path?>/elenco" class="navbar-brand text-bold mr-2">Tutti i capi</a>
            <a href="<?=$base_path?>/elenco/genere/Uomo" class="btn btn-link">Uomo</a>
            <a href="<?=$base_path?>/elenco/genere/Donna" class="btn btn-link">Donna</a>
            <a href="<?=$base_path?>/elenco/categorie/pantaloni" class="btn btn-link">Pantaloni</a>

        </section>
        <!--<section class="navbar-section">
            <div class="input-group input-inline">
                <input class="form-input" type="text" placeholder="search">
                <button class="btn btn-primary input-group-btn">Search</button>
            </div>
        </section>-->
    </header>
<!--Questa parte sarà sempre così e serve a includere
il template che contiene il contenuto vero e proprio-->
    <h1 style="font-size: xxx-large">Il mio negozio</h1>
<?=$this->section('content')?>
</div>
</body>
</html>
