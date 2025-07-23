<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/');

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

// Validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['propiedad', 'vendedor'];

    return in_array($tipo, $tipos);
}

// Muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Borrado Correctamente';
            break;
        case 4:
            $mensaje = 'Mensaje enviado correctamente';
            break;
        case 5:
            $mensaje = 'Error al enviar el mensaje';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarID(string $url){
    // Obtener id y validar el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header("Location: $url");
    }
    return $id;
}

function debugear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}