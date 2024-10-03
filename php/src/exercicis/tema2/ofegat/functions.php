<?php
function inicialitzarLletres($paraula) {
    return array_fill(0, strlen($paraula), "_");
}

function comprovarLletra($paraula, $lletra, &$lletresEndevinades) {
    $esCorrecta = false;

    for ($i = 0; $i < strlen($paraula); $i++) {
        if ($paraula[$i] == $lletra) {
            $lletresEndevinades[$i] = $lletra; 
            $esCorrecta = true;
        }
    }
    return $esCorrecta;
}

function mostrarLletresEndevinades($lletresEndevinades) {
    return implode(" ", $lletresEndevinades);
}

