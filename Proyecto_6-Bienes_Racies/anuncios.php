<?php 
require 'includes/app.php';
incluirTemplate('header');
?>

    <main class="seccion contenedor">
        <h2>Casas y Apartamentos en Venta</h2>
            <?php 
                $limite = 10;
                include 'includes/templates/anuncios.php';
            ?>
        <div class="alinear-derecha">
            <a href="index.php" class="boton-verde">Volver</a>
        </div>
    </main> <!--.seccion contenedor-->

    <?php 
    incluirTemplate('footer');
    ?>