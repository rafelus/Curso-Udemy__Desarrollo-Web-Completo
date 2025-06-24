<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta junto al bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen anuncio">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">3,000,000 &euro;</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento" loading="lazy">
                    <p>4</p>
                </li>
                <li>
                    <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                    <p>5</p>
                </li>
            </ul>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum saepe aliquid necessitatibus cupiditate veritatis dolorum blanditiis, itaque quisquam dolorem odit, corporis amet unde autem, fugit quam eos! Incidunt, ipsum modi. Lorem ipsum dolor sit amet consectetur adipisicing elit. Est blanditiis eligendi sapiente, esse tempora dolores consequatur eveniet? Necessitatibus fugiat molestias unde accusamus, in eligendi esse debitis pariatur harum illum nam.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit aperiam molestiae laborum accusantium ratione architecto dignissimos beatae nesciunt tempore adipisci, rem quod, non, veritatis cumque voluptates! Possimus esse quibusdam rerum! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil inventore culpa corporis vel nisi voluptatem exercitationem voluptatibus consequuntur! Maxime voluptatibus deserunt possimus facere mollitia saepe molestiae vitae atque iste aliquam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Et optio iste laborum tenetur corporis, animi necessitatibus in nulla quibusdam molestias. Quis animi, deserunt dicta voluptas consectetur at laborum provident quod?</p>
        </div>
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Volver</a>
        </div>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>