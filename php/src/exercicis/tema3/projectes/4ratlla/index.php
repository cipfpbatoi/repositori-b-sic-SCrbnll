<?php
session_start();
include 'functions.php';

if (!isset($_COOKIE['nomUsuari'])) {
    echo "<p>Acceso denegado. Debes iniciar sesión para acceder a esta página.</p>";
    echo "<a href='../index.php'>Volver a la página de inicio de sesión</a>";
    exit(); 
}

if (!isset($_SESSION['graella'])) {
    $_SESSION['graella'] = inicialitzarGraella();
    $_SESSION['jugadorActual'] = 1;
    $_SESSION['guanyador'] = null; 
}

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$graella = $_SESSION['graella'];
$jugadorActual = $_SESSION['jugadorActual'];
$guanyador = $_SESSION['guanyador'];

// ** Comprovar si el joc ha acabat abans de permetre qualsevol moviment **
if ($guanyador === null) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna'])) {
        $columna = (int)$_POST['columna'] - 1;

        // Fer moviment i només si és vàlid, comprovar si hi ha guanyador
        if (ferMoviment($graella, $columna, $jugadorActual)) {
            // Després del moviment, comprovem si aquest jugador guanya
            if (comprovarGuanyador($graella, $jugadorActual)) {
                $guanyador = $jugadorActual; // Guardar el guanyador a la sessió
                $_SESSION['guanyador'] = $guanyador;
            } elseif (comprovarEmpat($graella)) {
                $guanyador = 0; // Empat
                $_SESSION['guanyador'] = $guanyador;
            } else {
                // Si no hi ha guanyador, canviar el torn
                $_SESSION['jugadorActual'] = $jugadorActual == 1 ? 2 : 1;
            }
        } else {
            echo "<p>La columna està plena. Tria una altra columna.</p>";
        }

        // Actualitzar la graella a la sessió
        $_SESSION['graella'] = $graella;
    }
}

echo "<!DOCTYPE html>
<html lang='ca'>
<head>
    <meta charset='UTF-8'>
    <title>4 en Ratlla</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff;
            background-color: #000;
            display: inline-block;
            margin: 10px;
            color: white;
            font-size: 2rem;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
        }
        .header-row td {
            background-color: black;
            color: white;
            font-weight: bold;
        }
        .player1 {
            background-color: red;
        }
        .player2 {
            background-color: yellow;
        }
        .buid {
            background-color: white;
            border-color: #000;
        }
        .disabled {
            pointer-events: none;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <h1>Joc de 4 en Ratlla</h1>";

echo pintarGraella($graella, $guanyador !== null);

// Mostrar mensaje del ganador o empate
if ($guanyador !== null) {
    if ($guanyador == 0) {
        echo "<p>Empat! El tauler està ple.</p>";
    } else {
        echo "<p>El Jugador $guanyador ha guanyat!</p>";
    }
}

// Mostrar el botón para reiniciar siempre
echo "<form action='' method='post'>
        <button type='submit' name='reiniciar'>Reiniciar Joc</button>
      </form>
      <form action='../index.php' method='get'>
        <button type='submit'>Volver a la pàgina d'inici</button>
    </form>";

// Mostrar el jugador actual
if ($guanyador === null) {
    echo "<p>Jugador actual: Jugador " . $_SESSION['jugadorActual'] . " (" . ($_SESSION['jugadorActual'] == 1 ? "Roig" : "Groc") . ")</p>";
}

echo "</body></html>";
?>
