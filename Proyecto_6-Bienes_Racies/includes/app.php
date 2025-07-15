<?php 
require "funciones.php";
require "config/database.php";
require __DIR__."/../vendor/autoload.php";
use App\Propiedad;

// Conectarnos a las Base de Datos
$db = conectarDB();

Propiedad::setDB($db);