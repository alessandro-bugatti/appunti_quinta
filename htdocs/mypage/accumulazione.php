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

$numeri = explode(',', $valori);

for ($i = 0; $i < count($numeri); $i++) {
    if ($operazione == 1) {
        $numeri[$i] *= $numeri[$i];
        }
    if ($operazione == 2) {
        $numeri[$i] *= $numeri[$i] * $numeri[$i];
    }
    if ($operazione == 3) {
        $numeri[$i] = sqrt($numeri[$i]);
    }
}
$da_stampare = array_fill(0, count($numeri), false);
if (isset($_POST['pari'])) {
    for ($i = 0; $i < count($numeri); $i++) {
        if ($numeri[$i] % 2 == 0)
            $da_stampare[$i] = true;
    }
}
if (isset($_POST['dispari'])) {
    for ($i = 0; $i < count($numeri); $i++) {
        if ($numeri[$i] % 2 != 0)
            $da_stampare[$i] = true;
    }
}
if (!isset($_POST['pari']) && !isset($_POST['dispari']))
    echo "<p>Non è stato selezionato nessun insieme</p>";
else
    for ($i = 0; $i < count($numeri); $i++)
        if ($da_stampare[$i] == true)
            echo $numeri[$i] . " ";

?>

</body>
</html>


