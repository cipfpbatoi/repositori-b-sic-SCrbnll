<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 5</title>
</head>
<body>
    <h1>Exercici 5: Arrays Multidimensionals</h1>

    <?php
    $taulaMultiplicar = [];

    for ($i = 1; $i <= 5; $i++) {
        for ($j = 1; $j <= 5; $j++) {
            $taulaMultiplicar[$i][$j] = $i * $j;
        }
    }

    echo "<h2>Taula de multiplicar:</h2>";
    echo "<table border='1' cellpadding='5'>";
    for ($i = 1; $i <= 5; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 5; $j++) {
            echo "<td>$i x $j = " . $taulaMultiplicar[$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

</body>
</html>
