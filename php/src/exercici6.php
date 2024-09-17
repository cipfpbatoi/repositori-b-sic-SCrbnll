<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 2</title>
</head>
<body>
<h1>Exercici 6: Categorització de la Nota</h1>

<?php
// Valor de la nota
$nota = 8;

// Categorització amb match
$resultat = match ($nota) {
    10 => "Excel·lent",
    8, 9 => "Molt bé",
    5, 6, 7 => "Bé",
    default => "Insuficient",
};

// Mostrar resultat
echo "<p>La teva nota és $nota, i la classificació és: <strong>$resultat</strong></p>";
?>
</body>
</html>