<?php
session_start();

// Limpiar el historial de personajes
if (isset($_SESSION['personajes_creados'])) {
    unset($_SESSION['personajes_creados']);
}

$_SESSION['mensaje'] = "<div class='mensaje-exito'>Historial de personajes limpiado correctamente.</div>";
$_SESSION['tipo_mensaje'] = "exito";

header("Location: index.php");
exit();
?>