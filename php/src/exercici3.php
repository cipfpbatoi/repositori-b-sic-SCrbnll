<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 3</title>
</head>
<body>
    <h1>Exercici 3: Treballar amb Arrays i Funcions</h1>

    <?php
    function calcularMitjana($numeros) {
        $suma = array_sum($numeros); 
        return $suma / count($numeros); 
    }

    $arrayNumeros = [5, 10, 15, 20, 25];

    echo "<h2>Array de números:</h2>";
    echo "<p>" . implode(", ", $arrayNumeros) . "</p>";

    $mitjana = calcularMitjana($arrayNumeros);
    echo "<h2>Resultat:</h2>";
    echo "<p>La suma dels números és: " . array_sum($arrayNumeros) . "</p>";
    echo "<p>El nombre total d'elements és: " . count($arrayNumeros) . "</p>";
    echo "<p>La mitjana és: $mitjana</p>";
    ?>

</body>
</html>
