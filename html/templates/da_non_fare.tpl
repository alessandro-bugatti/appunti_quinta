<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<h1>Esempio di cosa non mettere nel client</h1>
<form action="controller_da_non_fare.php" method="post">
    <p>
        <p>Costo della copertina: i valori del costo sono inseriti direttamente nei valori del menù a tendina,
            solo che così facendo si permette al client di modificarli a piacimento. L'idea generale
            è di non mai mettere sul client informazioni che deve conoscere il server</p>
        <select name="costo">
            <option value="3">
                Morbida
            </option>
            <option value="5">
                Rigida
            </option>
            <option value="8">
                Rigida con foto
            </option>
        </select>
    </p>


    <button>Invia</button>

</form>

<p>IL costo è <?=$costo?> </p>
</body>
</html>