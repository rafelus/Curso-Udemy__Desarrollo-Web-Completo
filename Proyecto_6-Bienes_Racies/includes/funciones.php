<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate( $nombre, $inicio = false){
    include TEMPLATES_URL . "/$nombre.php";
}

function estadoAutenticado(){
    // Comprueba si la sesión está iniciada
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
}

// Escapa / Sanitizar el HTML
function s($html){
    $s = htmlspecialchars($html);
    return $s;
}