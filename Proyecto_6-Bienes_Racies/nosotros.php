<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis repellat repudiandae, vel voluptas aspernatur dolor suscipit ab dolorem animi qui magni a soluta enim, eligendi facilis, quia est veritatis possimus. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure, placeat, quo voluptates culpa rem autem vero tempore neque asperiores obcaecati blanditiis optio. Quas ut quod optio eum hic harum ducimus? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, tempore minus quas rerum asperiores non, aperiam perspiciatis nisi natus officia tempora distinctio voluptatibus cupiditate doloremque explicabo impedit laudantium, veritatis perferendis. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
        
    </main>

    <section class="contenedor seccion">
        <h1>Más sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia voluptates iure repellendus, vero nesciunt quasi esse quibusdam expedita quia? At sequi non harum quas obcaecati quisquam cumque laborum, cupiditate iste!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia voluptates iure repellendus, vero nesciunt quasi esse quibusdam expedita quia? At sequi non harum quas obcaecati quisquam cumque laborum, cupiditate iste!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia voluptates iure repellendus, vero nesciunt quasi esse quibusdam expedita quia? At sequi non harum quas obcaecati quisquam cumque laborum, cupiditate iste!</p>
            </div>
        </div>
        <div class="alinear-derecha">
            <a href="index.php" class="boton-verde">Volver</a>
        </div>
    </section> <!--.contenedor seccion-->
    
    <?php 
    incluirTemplate('footer');
    ?>