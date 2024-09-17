<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 1</title>
</head>
<body>
    <h1>Exercici 1: Manipulació de Variables i Operadors</h1>

    <?php
    // Variables
    $a = 10;
    $b = 20;
    $c = 5;

    // Operadors aritmètics
    $suma = $a + $b;
    $resta = $b - $c;
    $multiplicacio = $a * $c;
    $divisio = $b / $c;

    // Operadors lògics
    $and = ($a < $b) && ($b > $c);  // True
    $or = ($a > $b) || ($c < $a);   // True
    $not = !($a > $b);              // True

    // Mostrar variables i operacions
    echo "<p>Valor de a: $a</p>";
    echo "<p>Valor de b: $b</p>";
    echo "<p>Valor de c: $c</p>";
    echo "<hr>";
    echo "<h2>Operadors Aritmètics:</h2>";
    echo "<p>Suma (a + b) = $suma</p>";
    echo "<p>Resta (b - c) = $resta</p>";
    echo "<p>Multiplicació (a * c) = $multiplicacio</p>";
    echo "<p>Divisió (b / c) = $divisio</p>";

    // Mostrar resultats de les operacions lògiques
    echo "<hr>";
    echo "<h2>Operadors Lògics:</h2>";
    echo "<p>(a < b) && (b > c): " . ($and ? 'True' : 'False') . "</p>";
    echo "<p>(a > b) || (c < a): " . ($or ? 'True' : 'False') . "</p>";
    echo "<p>!(a > b): " . ($not ? 'True' : 'False') . "</p>";
    ?>
</body>
</html>