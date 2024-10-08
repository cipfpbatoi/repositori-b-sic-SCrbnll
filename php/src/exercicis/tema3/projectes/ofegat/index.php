<?php
session_start(); 
include 'functions.php';

if (!isset($_COOKIE['nomUsuari'])) {
    echo "<p>Acceso denegado. Debes iniciar sesión para acceder a esta página.</p>";
    echo "<a href='../index.php'>Volver a la página de inicio de sesión</a>";
    exit(); 
}

if (!isset($_SESSION['paraula'])) {
    $_SESSION['paraula'] = "javascript";
    $_SESSION['lletresEndevinades'] = inicialitzarLletres($_SESSION['paraula']);
    $_SESSION['intentsRestants'] = 6; 
}

$paraula = $_SESSION['paraula'];
$lletresEndevinades = $_SESSION['lletresEndevinades'];

$paraulaCompletada = comprovarParaulaCompletada($lletresEndevinades);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["lletra"]) && !$paraulaCompletada && $_SESSION['intentsRestants'] > 0) {
    $lletra = strtolower($_POST["lletra"]); 
    $esCorrecta = comprovarLletra($paraula, $lletra, $lletresEndevinades);
    
    $_SESSION['lletresEndevinades'] = $lletresEndevinades; 
    if ($esCorrecta) {
        $missatge = "<p class='correct'>Correcte! La lletra '$lletra' està en la paraula.</p>";
    } else {
        $missatge = "<p class='incorrect'>Incorrecte. La lletra '$lletra' no està en la paraula.</p>";
        $_SESSION['intentsRestants']--; 
    }
    
    $paraulaCompletada = comprovarParaulaCompletada($lletresEndevinades);
} else {
    $missatge = ""; 
}

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>
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
    echo "<p>" . mostrarLletresEndevinades($lletresEndevinades) . "</p>";
    echo $missatge;
    echo "<p>Intents restants: " . $_SESSION['intentsRestants'] . "</p>";

    if ($paraulaCompletada) {
        echo "<p class='correct'>Felicitats! Has endevinat la paraula '$paraula'.</p>";
    } elseif ($_SESSION['intentsRestants'] <= 0) {
        echo "<p class='incorrect'>Has perdut! No et queden intents. La paraula era '$paraula'.</p>";
    }
    ?>

    <form action="" method="post">
        <label for="lletra">Introdueix una lletra:</label>
        <input type="text" id="lletra" name="lletra" maxlength="1" required 
               <?php if ($paraulaCompletada || $_SESSION['intentsRestants'] <= 0) echo 'disabled'; ?>>
        <button type="submit" 
                <?php if ($paraulaCompletada || $_SESSION['intentsRestants'] <= 0) echo 'disabled'; ?>>
            Endevinar
        </button>
    </form>

    <form action="" method="post">
        <button type="submit" name="reiniciar">Reiniciar Joc</button>
    </form>
    <form action="../index.php" method="get">
        <button type="submit">Volver a la pàgina d'inici</button>
    </form>
</body>
</html>
