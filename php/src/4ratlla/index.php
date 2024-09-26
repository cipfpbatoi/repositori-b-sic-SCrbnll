<?php

include 'functions.php';
$graella = inicialitzarGraella();

$graella[5][3] = 1; 
$graella[5][4] = 2; 

$jugadorActual = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['columna'])) {
    $columna = (int)$_POST['columna'] - 1;  // Restar 1 para que coincida con el índice del array
    if (ferMoviment($graella, $columna, $jugadorActual)) {
    } else {
        echo "<p>La columna está llena. Por favor, elige otra columna.</p>";
    }
}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>4 en Ratlla</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff; /* Cercle amb punts blancs */
            background-color: #000; /* Fons negre o pot ser un altre color */
            display: inline-block;
            margin: 10px;
            color: white;
            font-size: 2rem;
            text-align: center ;
            vertical-align: middle;
        }
        .header-row td {
            background-color: black;
            color: white;
            font-weight: bold;
        }
        .player1 {
            background-color: red; /* Color vermell per un dels jugadors */
        }
        .player2 {
            background-color: yellow; /* Color groc per l'altre jugador */
        }
        .buid {
            background-color: white; /* Color blanc per cercles buits */
            border-color: #000; /* Puntes negres per millor visibilitat */
        }
    </style>
</head>
<body>
    <h1>Juego 4 en Ratlla</h1>";

echo pintarGraella($graella);

echo "<form action='' method='post'>
        <label for='columna'>Elige la columna:</label>
        <select id='columna' name='columna' required>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
        </select>
        <button type='submit'>Hacer movimiento</button>
      </form>";

echo "<p>Jugador actual: Jugador 1 (Rojo)</p>";
echo "</body></html>";
?>
