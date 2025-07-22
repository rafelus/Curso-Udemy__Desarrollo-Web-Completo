<main class="contenedor seccion">

    <?php include __DIR__.'/iconos.php'; ?>
    
</main> <!--.contenedor seccion-->

<section class="seccion contenedor">
    <h2>Casa y Apartamentos en Venta</h2>
    <?php 
        include __DIR__.'/listado.php';
    ?>
    <div class="alinear-derecha">
        <a href="/anuncios" class="boton-verde">Ver Todas</a>
    </div>
</section> <!--.seccion contenedor-->

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un assesor se pondrá en contacto contigo en la mayor brevedad posible</p>
    <a href="/contacto" class="boton-amarillo">Contáctanos</a>
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
                <a href="/entrada">
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
                <a href="/entrada">
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