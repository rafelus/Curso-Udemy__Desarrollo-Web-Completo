<?php
function conectarDB(){
    $db = new mysqli('localhost', 'root', 'root', 'bienesraices_crud');

    if(!$db){
        echo 'Error no se pudo conectar';
        exit;
    }
    return $db;
}