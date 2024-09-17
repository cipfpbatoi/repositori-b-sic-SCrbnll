<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 2</title>
</head>
<body>
<h1>Exercici 2: Control de Flux amb Bucles</h1>

<h2>Números parells del 0 al 20 (Bucle for)</h2>
<ul>
    <?php
    for ($i = 0; $i <= 20; $i += 2) {
        echo "<li>$i</li>";
    }
    ?>
</ul>

<h2>Números parells del 0 al 20 (Bucle while)</h2>
<ul>
    <?php
    $i = 0;
    while ($i <= 20) {
        echo "<li>$i</li>";
        $i += 2;
    }
    ?>
</ul>
</body>
</html>