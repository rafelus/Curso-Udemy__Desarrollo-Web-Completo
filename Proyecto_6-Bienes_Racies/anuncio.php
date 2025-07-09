<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <?php 
            include 'includes/templates/anuncio.php';
        ?>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Volver</a>
        </div>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>