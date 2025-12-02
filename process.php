<?php
session_start();

include 'includes/personajes.php';
include 'utils/functions.php';

if (!isset($_SESSION['personajes_creados'])) {
    $_SESSION['personajes_creados'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['especie']) || !isset($_POST['nombre']) || empty($_POST['nombre'])) {
        $_SESSION['mensaje'] = "<div class='mensaje-error'>Error: Datos incompletos</div>";
        $_SESSION['tipo_mensaje'] = "error";
        header("Location: index.php");
        exit();
    }
    
    $especie = $_POST['especie'];
    $nombre = trim($_POST['nombre']);
    
    try {
        if ($especie == 'guerrero') {
            $enemigosAbatidos = intval($_POST['enemigosAbatidos'] ?? 0);
            $danoSufrido = intval($_POST['danoSufrido'] ?? 0);
            $personaje = new Guerrero($nombre, $especie, $enemigosAbatidos, $danoSufrido);
            
        } elseif ($especie == 'mago') {
            $secretosDescubiertos = intval($_POST['secretosDescubiertos'] ?? 0);
            $hechizosLanzados = intval($_POST['hechizosLanzados'] ?? 0);
            $personaje = new Mago($nombre, $especie, $secretosDescubiertos, $hechizosLanzados);
            
        } elseif ($especie == 'explorador') {
            $objetivosDescubiertos = intval($_POST['objetivosDescubiertos'] ?? 0);
            $vecesSinSerDescubierto = intval($_POST['vecesSinSerDescubierto'] ?? 0);
            $personaje = new Explorador($nombre, $especie, $objetivosDescubiertos, $vecesSinSerDescubierto);
        } else {
            throw new Exception("Especie no válida");
        }
        
        $estadisticas = "";
        if ($personaje instanceof Guerrero) {
            $estadisticas = "Enemigos: {$personaje->enemigosAbatidos}, Daño: {$personaje->danoSufrido}";
        } elseif ($personaje instanceof Mago) {
            $estadisticas = "Secretos: {$personaje->secretosDescubiertos}, Hechizos: {$personaje->hechizosLanzados}";
        } elseif ($personaje instanceof Explorador) {
            $estadisticas = "Objetivos: {$personaje->objetivosDescubiertos}, Sin detección: {$personaje->vecesSinSerDescubierto}";
        }
        
        $_SESSION['personajes_creados'][] = [
            'nombre' => $personaje->nombre,
            'especie' => $personaje->especie,
            'experiencia' => $personaje->puntosExperiencia,
            'estadisticas' => $estadisticas,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        $historialHtml = "";
        $personajesHistorial = array_reverse($_SESSION['personajes_creados']);
        
        if (empty($personajesHistorial)) {
            $historialHtml = "<p class='sin-personajes'>Aún no has creado personajes.</p>";
        } else {
            foreach ($personajesHistorial as $index => $pers) {
                $numero = count($personajesHistorial) - $index;
                $historialHtml .= "
                    <div class='personaje-historial-item'>
                        <div class='personaje-historial-header'>
                            <span class='personaje-numero'>#{$numero}</span>
                            <strong>{$pers['nombre']}</strong> 
                            <span class='personaje-especie'>({$pers['especie']})</span>
                            <span class='personaje-experiencia'>Exp: {$pers['experiencia']}</span>
                        </div>
                        <div class='personaje-estadisticas'>{$pers['estadisticas']}</div>
                        <div class='personaje-fecha'>Creado: {$pers['timestamp']}</div>
                    </div>
                ";
            }
        }
        
        
        $_SESSION['tipo_mensaje'] = "exito";
        
    } catch (Exception $e) {
        $_SESSION['mensaje'] = "<div class='mensaje-error'>Error al crear personaje: " . $e->getMessage() . "</div>";
        $_SESSION['tipo_mensaje'] = "error";
    }
} else {
    $_SESSION['mensaje'] = "<div class='mensaje-error'>Método no permitido</div>";
    $_SESSION['tipo_mensaje'] = "error";
}

header("Location: resultado.php");
exit();
?>