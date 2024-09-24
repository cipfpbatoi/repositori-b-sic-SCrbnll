<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercici 4</title>
</head>
<body>
    <h1>Exercici 4: Manipulació de Strings</h1>

    <?php
    function comptarVocals($cadena) {
        $cadena = strtolower($cadena); 
        $vocales = ['a', 'e', 'i', 'o', 'u']; s
        $comptador = 0;

        for ($i = 0; $i < strlen($cadena); $i++) {
            if (in_array($cadena[$i], $vocales)) {
                $comptador++;
            }
        }

        return $comptador;
    }

    $cadenaText = "Hola, com estàs?";

    echo "<h2>Cadena de text:</h2>";
    echo "<p>$cadenaText</p>";

    $numVocals = comptarVocals($cadenaText);
    echo "<h2>Resultat:</h2>";
    echo "<p>El nombre de vocals és: $numVocals</p>";
    ?>

</body>
</html>
