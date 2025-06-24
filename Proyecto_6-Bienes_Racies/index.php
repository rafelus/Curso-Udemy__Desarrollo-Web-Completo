<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
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
    </main> <!--.contenedor seccion-->

    <section class="seccion contenedor">
        <h2>Casa y Apartamentos en Venta</h2>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio1.webp" type="image/webp">
                    <source srcset="build/img/anuncio1.jpg" type="image/jpeg">
                    <img src="build/img/anuncio1.jpg" alt="anuncio" loading="lazy">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa de Lujo en el Lago</h3>
                    <p>Casa en el lago con excelentes vistas y acabados de lujo a un excelente precio</p>
                    <p class="precio">3,000,000 &euro;</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento" loading="lazy">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                            <p>4</p>
                        </li>
                    </ul>
                    <a href="anuncio.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div> <!--.anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio2.webp" type="image/webp">
                    <source srcset="build/img/anuncio2.jpg" type="image/jpeg">
                    <img src="build/img/anuncio2.jpg" alt="anuncio" loading="lazy">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con acabados de Lujo</h3>
                    <p>Casa con diseño moderno, tecnología inteligente y amueblada</p>
                    <p class="precio">2,000,000 &euro;</p>
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
                    <a href="anuncio.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div> <!--.anuncio-->
            <div class="anuncio">
                <picture>
                    <source srcset="build/img/anuncio3.webp" type="image/webp">
                    <source srcset="build/img/anuncio3.jpg" type="image/jpeg">
                    <img src="build/img/anuncio3.jpg" alt="anuncio" loading="lazy">
                </picture>
                <div class="contenido-anuncio">
                    <h3>Casa con piscina</h3>
                    <p>Casa con piscina y acabados de lujo en la ciudad, excelente oportunidad</p>
                    <p class="precio">3,500,000 &euro;</p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                            <p>5</p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento" loading="lazy">
                            <p>4</p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
                            <p>7</p>
                        </li>
                    </ul>
                    <a href="anuncio.php" class="boton-amarillo-block">Ver Propiedad</a>
                </div>
            </div> <!--.anuncio-->
        </div> <!--.contenedor-anuncios-->
        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section> <!--.seccion contenedor-->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un assesor se pondrá en contacto contigo en la mayor brevedad posible</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section> <!--.imagen-contacto-->

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="webp">
                        <source srcset="build/img/blog1.jpg" type="jpeg">
                        <img src="build/img/blog1.jpg" alt="Imagen entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores matriales y ahorrando dinero.
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="webp">
                        <source srcset="build/img/blog2.jpg" type="jpeg">
                        <img src="build/img/blog2.jpg" alt="Imagen entrada blog" loading="lazy">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2024</span> por: <span>Admin</span></p>
                        <p>
                            Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>
        </section> <!--.blog -->
        <section class="testimoniales">
            <h3>Opiniones</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una forma excelente, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>-Rafa Vázquez</p>
            </div>
        </section>
    </div> <!--.contenedor seccion-->

    <?php 
    incluirTemplate('footer');
    ?>