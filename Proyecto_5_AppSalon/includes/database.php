<?php

$conexion = mysqli_connect('localhost', 'root', 'root', 'appSalon');

if(!$conexion){
    echo 'Hubo un error';
    exit;
}