<?php
session_start();

if (!isset($_POST['especie']) || !isset($_POST['nombre']) || empty(trim($_POST['nombre']))) {
    header("Location: form_crear_personajes_1.php");
    exit();
}

$especie = $_POST['especie'];
$nombre = htmlspecialchars(trim($_POST['nombre']));

// Determinar clase CSS según la especie
$clase_estadisticas = '';
$icono_clase = '';
$titulo_clase = '';

switch($especie) {
    case 'guerrero':
        $clase_estadisticas = 'guerrero-stats';
        $icono_clase = '💂‍♂️';
        $titulo_clase = 'Guerrero';
        break;
    case 'mago':
        $clase_estadisticas = 'mago-stats';
        $icono_clase = '🧙‍♂️';
        $titulo_clase = 'Mago';
        break;
    case 'explorador':
        $clase_estadisticas = 'explorador-stats';
        $icono_clase = '🧔‍♂️';
        $titulo_clase = 'Explorador';
        break;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Personaje - Reino de Aethelgard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php 
    if (file_exists('../includes/header.html')) {
        include '../includes/header.html';
    } else {
        echo '<!-- Header no encontrado -->';
    }
    ?>
    
    <div class="contenedor-formulario-2">
        <form method="POST" action="../process.php" class="formulario-personaje">
            <input type="hidden" name="especie" value="<?php echo $especie; ?>">
            <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
            
            <h1 class="titulo-formulario">
                Forjando a <span style="color: var(--color-primary);"><?php echo $nombre; ?></span>
            </h1>
            
            <div class="badge-clase"><?php echo $titulo_clase; ?> <?php echo $icono_clase; ?></div>
            
            <fieldset class="estadisticas-seccion <?php echo $clase_estadisticas; ?>">
                <legend>Estadísticas de <?php echo $nombre; ?></legend>
                
                <div class="grupo-estadisticas">
                    <?php if ($especie == 'guerrero'): ?>
                        <div class="estadistica-item">
                            <label for="enemigosAbatidos">🏹 Enemigos Abatidos</label>
                            <input type="number" min="0" max="100" name="enemigosAbatidos" value="0" required 
                                   placeholder="Número de enemigos derrotados">
                        </div>
                        <div class="estadistica-item">
                            <label for="danoSufrido">🛡️ Daño Sufrido</label>
                            <input type="number" min="0" max="1000" name="danoSufrido" value="0" required 
                                   placeholder="Cantidad de daño recibido">
                        </div>
                    
                    <?php elseif ($especie == 'mago'): ?>
                        <div class="estadistica-item">
                            <label for="secretosDescubiertos">📜 Secretos Descubiertos</label>
                            <input type="number" min="0" max="100" name="secretosDescubiertos" value="0" required 
                                   placeholder="Misterios desvelados">
                        </div>
                        <div class="estadistica-item">
                            <label for="hechizosLanzados">✨ Hechizos Lanzados</label>
                            <input type="number" min="0" max="1000" name="hechizosLanzados" value="0" required 
                                   placeholder="Conjuros realizados">
                        </div>
                    
                    <?php else: ?>
                        <div class="estadistica-item">
                            <label for="objetivosDescubiertos">🎯 Objetivos Descubiertos</label>
                            <input type="number" min="0" max="100" name="objetivosDescubiertos" value="0" required 
                                   placeholder="Metas descubiertas">
                        </div>
                        <div class="estadistica-item">
                            <label for="vecesSinSerDescubierto">🌲 Veces Sin Ser Descubierto</label>
                            <input type="number" min="0" max="1000" name="vecesSinSerDescubierto" value="0" required 
                                   placeholder="Éxitos en sigilo">
                        </div>
                    <?php endif; ?>
                </div>
            </fieldset>
            
            <button type="submit" class="boton-crear">
                🎮 Crear Personaje y Forjar Leyenda
            </button>
        </form>
    </div>

    <?php 
    if (file_exists('footer.html')) {
        include 'footer.html';
    } else {
        echo '<!-- Footer no encontrado -->';
    }
    ?>
</body>
</html>