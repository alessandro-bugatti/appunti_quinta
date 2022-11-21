<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accumulazione</title>
</head>
<body>

<?php
    $valori = $_POST['valori'];
    $operazione = $_POST['operazioni'];
    echo $valori;
    $numeri = explode(',', $valori);
    echo '<pre>';
    var_dump($numeri);
    echo '</pre>';
    for ($i = 0; $i < count($numeri); $i++){
        echo ($numeri[$i] * 10) . '<br>';
    }
    for($i = 0; $i < count($numeri); $i++){
        if ($operazione == 1){
            echo ($numeri[$i] * $numeri[$i]) . ' ';
        }
        if ($operazione == 2){
            echo ($numeri[$i] * $numeri[$i] * $numeri[$i]) . ' ';
        }
        if ($operazione == 3){
            echo (sqrt($numeri[$i])) . ' ';
        }
    }
?>

</body>
</html>


