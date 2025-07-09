<?php
require 'app.php';

function incluirTemplate( $nombre, $inicio = false){
    include TEMPLATES_URL . "/$nombre.php";
}

function estadoAutenticado(){
    // Comprueba si la sesión está iniciada
    session_start();

    $auth = $_SESSION['login'];
    if($auth){
        return true;
    }
    return false;
}