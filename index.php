<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Juego de Rol</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php 
    if (file_exists('includes/header.html')) {
        include 'includes/header.html';
    } else {
        echo '<!-- Header no encontrado -->';
    }
    
    // Mostrar mensajes de sesión
    if (isset($_SESSION['mensaje'])) {
        echo '<div class="mensaje ' . ($_SESSION['tipo_mensaje'] ?? 'info') . '">';
        echo $_SESSION['mensaje'];
        echo '</div>';
        
        // Limpiar mensaje después de mostrarlo
        unset($_SESSION['mensaje']);
        unset($_SESSION['tipo_mensaje']);
    }
    ?>
    
    <main>
        <div class="contenedor-principal">
            <div class="formulario-creacion">
                <h2>Crear Nuevo Personaje</h2>
                <?php include 'includes/form_crear_personajes_1.php'; ?>
            </div>
            
            <div class="historial-personajes">
                <h2>🏆 Tus Personajes Creados</h2>
                <?php
                if (isset($_SESSION['personajes_creados']) && !empty($_SESSION['personajes_creados'])) {
                    echo '<div class="lista-personajes-historial">';
                    $personajes = array_reverse($_SESSION['personajes_creados']);
                    foreach ($personajes as $index => $personaje) {
                        $numero = count($personajes) - $index;
                        echo "
                            <div class='personaje-historial-item'>
                                <div class='personaje-historial-header'>
                                    <span class='personaje-numero'>#{$numero}</span>
                                    <strong>{$personaje['nombre']}</strong> 
                                    <span class='personaje-especie'>({$personaje['especie']})</span>
                                    <span class='personaje-experiencia'>Exp: {$personaje['experiencia']}</span>
                                </div>
                                <div class='personaje-estadisticas'>{$personaje['estadisticas']}</div>
                                <div class='personaje-fecha'>Creado: {$personaje['timestamp']}</div>
                            </div>
                        ";
                    }
                    echo '</div>';
                    
                    // Botón para limpiar historial
                    echo '
                    <div class="botones-historial">
                        <form method="POST" action="limpiar_historial.php" onsubmit="return confirm(\'¿Estás seguro de que quieres eliminar todos tus personajes?\')">
                            <button type="submit" class="btn btn-danger">🗑️ Limpiar Historial</button>
                        </form>
                    </div>';
                } else {
                    echo '<p class="sin-personajes">Aún no has creado personajes. ¡Crea tu primer personaje arriba!</p>';
                }
                ?>
            </div>
        </div>
    </main>
    
    <?php 
    if (file_exists('includes/footer.html')) {
        include 'includes/footer.html';
    } else {
        echo '<!-- Footer no encontrado -->';
    }
    ?>
</body>
</html>