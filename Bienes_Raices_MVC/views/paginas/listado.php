<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
        <img src="/imagenes/<?php echo $propiedad->imagen?>" alt="anuncio" loading="lazy">
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo?></h3>
            <p><?php echo $propiedad->descripcion?></p>
            <p class="precio"><?php echo $propiedad->precio?> &euro;</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p><?php echo $propiedad->wc?></p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento" loading="lazy">
                    <p><?php echo $propiedad->estacionamiento?></p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>
            <a href="/anuncio?id=<?php echo $propiedad->id?>" class="boton-amarillo-block">Ver Propiedad</a>
        </div>
    </div> <!--.anuncio-->
    <?php 
        endforeach; 
    ?>
</div> <!--.contenedor-anuncios-->