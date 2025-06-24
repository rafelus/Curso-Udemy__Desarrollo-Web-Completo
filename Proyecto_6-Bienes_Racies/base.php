<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>

<body>
    <header class="header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="build/img/logo.svg" alt="Logotipo de Bienas Raices">
                </a>
                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                </nav>
            </div> <!--.barra-->
        </div>
    </header>
    
    <main class="contenedor seccion">
        <h1>Pagina Base</h1>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>