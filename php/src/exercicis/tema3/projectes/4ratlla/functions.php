<?php

function inicialitzarGraella() {
    // Crea una graella de 6x7 inicialitzada amb zeros
    return array_fill(0, 6, array_fill(0, 7, 0)); // 6 files, 7 columnes
}

function pintarGraella($graella, $deshabilitat = false) {
    $html = "<table>";
    
    // Pintar les files de la graella
    for ($i = 0; $i < 6; $i++) {
        $html .= "<tr>";
        for ($j = 0; $j < 7; $j++) {
            $clase = "buid"; 
            if ($graella[$i][$j] == 1) {
                $clase = "player1"; 
            } elseif ($graella[$i][$j] == 2) {
                $clase = "player2"; 
            }
            $html .= "<td class='$clase'></td>";
        }
        $html .= "</tr>";
    }
    
    // Pintar la fila de números
    $html .= "<tr class='header-row'>";
    for ($j = 0; $j < 7; $j++) {
        if ($deshabilitat) {
            // Si el joc ha acabat, deshabilitar els botons
            $html .= "<td class='disabled'>" . ($j + 1) . "</td>";
        } else {
            // Se genera un formulario para cada columna con un botón
            $html .= "<td>
                        <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='columna' value='".($j + 1)."'>
                            <button type='submit' style='background: none; border: none; color: white; cursor: pointer;'>".($j + 1)."</button>
                        </form>
                      </td>";
        }
    }
    $html .= "</tr>";

    $html .= "</table>";
    return $html;
}

function ferMoviment(&$graella, $columna, $jugadorActual) {
    // Colocar la ficha en la columna especificada
    for ($i = 5; $i >= 0; $i--) {
        if ($graella[$i][$columna] == 0) {
            $graella[$i][$columna] = $jugadorActual;
            return true; // Movimiento exitoso
        }
    }
    return false; // Columna plena
}

function comprovarGuanyador($graella, $jugador) {
    // Comprovar files, columnes i diagonals
    for ($i = 0; $i < 6; $i++) {
        for ($j = 0; $j < 7; $j++) {
            if ($graella[$i][$j] == $jugador) {
                // Comprovar horitzontal
                if ($j + 3 < 7 && $graella[$i][$j + 1] == $jugador && $graella[$i][$j + 2] == $jugador && $graella[$i][$j + 3] == $jugador) {
                    return true;
                }
                // Comprovar vertical
                if ($i + 3 < 6 && $graella[$i + 1][$j] == $jugador && $graella[$i + 2][$j] == $jugador && $graella[$i + 3][$j] == $jugador) {
                    return true;
                }
                // Comprovar diagonal dreta
                if ($i + 3 < 6 && $j + 3 < 7 && $graella[$i + 1][$j + 1] == $jugador && $graella[$i + 2][$j + 2] == $jugador && $graella[$i + 3][$j + 3] == $jugador) {
                    return true;
                }
                // Comprovar diagonal esquerra
                if ($i + 3 < 6 && $j - 3 >= 0 && $graella[$i + 1][$j - 1] == $jugador && $graella[$i + 2][$j - 2] == $jugador && $graella[$i + 3][$j - 3] == $jugador) {
                    return true;
                }
            }
        }
    }
    return false;
}

function comprovarEmpat($graella) {
    // Comprovar si el tauler està ple
    foreach ($graella as $fila) {
        if (in_array(0, $fila)) {
            return false;
        }
    }
    return true; // Tauler ple
}
