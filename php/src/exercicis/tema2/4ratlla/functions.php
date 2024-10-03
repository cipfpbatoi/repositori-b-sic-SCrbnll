<?php

function inicialitzarGraella() {
    return array_fill(0, 6, array_fill(0, 7, 0));
}

function pintarGraella($graella) {
    $html = "<table>";
    
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
    
    $html .= "<tr class='header-row'>";
    for ($j = 0; $j < 7; $j++) {
        $html .= "<td>" . ($j + 1) . "</td>";
    }
    $html .= "</tr>";

    $html .= "</table>";
    return $html;
}

function ferMoviment(&$graella, $columna, $jugadorActual) {
    for ($i = 5; $i >= 0; $i--) {
        if ($graella[$i][$columna] == 0) {  
            $graella[$i][$columna] = $jugadorActual;  
            return true;
        }
    }
    return false; 
}
?>
