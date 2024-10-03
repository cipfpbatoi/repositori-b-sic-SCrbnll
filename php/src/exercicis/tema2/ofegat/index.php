<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Joc de l'Ofegat</title>
    <style>
        .correct { color: green; }
        .incorrect { color: red; }
    </style>
</head>
<body>
    <h1>Joc de l'Ofegat</h1>

    <?php
    include 'functions.php';

    $paraula = "javascript";
    $lletresEndevinades = inicialitzarLletres($paraula);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lletra"])) {
        $lletra = strtolower($_POST["lletra"]); 

        $esCorrecta = comprovarLletra($paraula, $lletra, $lletresEndevinades);

        if ($esCorrecta) {
            $missatge = "<p class='correct'>Correcte! La lletra '$lletra' està en la paraula.</p>";
        } else {
            $missatge = "<p class='incorrect'>Incorrecte. La lletra '$lletra' no està en la paraula.</p>";
        }
    } else {
        $missatge = ""; 
    }

    echo "<p>" . mostrarLletresEndevinades($lletresEndevinades) . "</p>";
    echo $missatge;
    ?>

    <form action="" method="post">
        <label for="lletra">Introdueix una lletra:</label>
        <input type="text" id="lletra" name="lletra" maxlength="1" required>
        <button type="submit">Endevinar</button>
    </form>
</body>
</html>
