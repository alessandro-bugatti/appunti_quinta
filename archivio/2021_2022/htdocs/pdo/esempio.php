<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=banca', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
    exit(1);
}

//il metodo query ritorna un oggetto che contiene i dati richiesti
$stmt = $pdo->query('SELECT * FROM cliente ORDER BY nominativo DESC');

/*
echo '<pre>';

var_dump($stmt);

echo '</pre>';
*/
echo '<table border="1">';

while ($row = $stmt->fetch())
{
    echo '<tr>';
    echo '<td> ' . $row['nominativo'] . '</td>';
    echo '<td> ' . $row['indirizzo'] . '</td>';
    echo '<td> ' . $row['telefono'] . '</td>';
    echo '</tr>';
}

echo '</table>';


//Secondo esempio con dati che arrivano dall'utente
//il metodo query ritorna un oggetto che contiene i dati richiesti
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = :id');
$stmt->bindParam('id', $id);
$stmt->execute();

/*
echo '<pre>';

var_dump($stmt);

echo '</pre>';
*/
echo '<br>';
echo '<table border="1">';
while ($row = $stmt->fetch())
{
    /*echo '<pre>';

    var_dump($row);

    echo '</pre>';
    */
    echo '<tr>';
    echo '<td> ' . $row['nominativo'] . '</td>';
    echo '<td> ' . $row['indirizzo'] . '</td>';
    echo '<td> ' . $row['telefono'] . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '<br>';

$stmt = $pdo->prepare('SELECT * FROM cliente WHERE id = :id');

$stmt->execute([
    'id' => $id
]);

/*
echo '<pre>';

var_dump($stmt);

echo '</pre>';
*/
echo '<table border="1">';
foreach ($stmt as $row)
{
    /*echo '<pre>';

    var_dump($row);

    echo '</pre>';
    */
    echo '<tr>';
    echo '<td> ' . $row['nominativo'] . '</td>';
    echo '<td> ' . $row['indirizzo'] . '</td>';
    echo '<td> ' . $row['telefono'] . '</td>';
    echo '</tr>';
}
echo '</table>';