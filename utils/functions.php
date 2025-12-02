<?php

function crearPersonajesEjemplo() {
    return [
        new Guerrero("Thor", "guerrero", 15, 200),
        new Guerrero("Conan", "guerrero", 25, 150),
        new Mago("Gandalf", "mago", 8, 30),
        new Mago("Merlín", "mago", 12, 45),
        new Explorador("Aragorn", "explorador", 18, 22),
        new Explorador("Legolas", "explorador", 14, 28)
    ];
}

function calcularExperienciaTotal($personajes) {
    $total = 0;
    foreach ($personajes as $personaje) {
        $total += $personaje->puntosExperiencia;
    }
    return $total;
}

function mostrarResumenClases($personajes) {
    $guerreros = array_filter($personajes, function($p) { return $p instanceof Guerrero; });
    $magos = array_filter($personajes, function($p) { return $p instanceof Mago; });
    $exploradores = array_filter($personajes, function($p) { return $p instanceof Explorador; });
    
    return [
        'guerreros' => count($guerreros),
        'magos' => count($magos),
        'exploradores' => count($exploradores)
    ];
}

?>
