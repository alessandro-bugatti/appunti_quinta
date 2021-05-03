<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prenotazioni</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mini.css/3.0.1/mini-default.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <header class="sticky">
                <button><img alt="logo" src="images/dna.svg?size=32&color=currentColor"></button>
                <button>Prenotazioni tamponi</button>
            </header>
        </div>
         <!--  This is the hamburger menu for mobile screens. Standard navigation, really!  -->
         <div class="row">
             <label for="drawer-control" class="drawer-toggle persistent"></label>
             <input type="checkbox" id="drawer-control" class="drawer persistent">
             <div class="col-md-4">
                 <label for="drawer-control" class="drawer-close"></label>
                 <nav>
                     <a href="index.php">Home</a>
                     <?php if(!isset($_SESSION['username'])): ?>
                         <a href="login.php">Login</a>
                     <?php else: ?>
                         <span>Operazioni</span>
                         <a href="lista_prenotazioni.php" class="sublink-1">Mostra tutte le prenotazioni</a>
                         <a href="lista_prenotazioni_giornaliere.php" class="sublink-1">Mostra le prenotazioni di oggi</a>
                         <a href="mostra_grafico_prenotazioni.php" class="sublink-1">Mostra il grafico delle prenotazioni</a>
                         <a href="esegui_tampone.php" class="sublink-1">Esegui un tampone</a>
                         <a href="registrazione.php" class="sublink-1">Registra un nuovo sanitario</a>
                         <a href="logout.php">Logout</a>
                     <?php endif ?>
                 </nav>
             </div>
             <div class="col-sm-11">
                 <h1><?= $argomento ?> </h1>
                 <?= $this->section('content') ?>
             </div>
         </div>
    </div>
</body>
</html>