<?php 
require "funciones.php";
require "config/database.php";
require __DIR__."/../vendor/autoload.php";

use App\ActiveRecord;

// Conectarnos a las Base de Datos
$db = conectarDB();

ActiveRecord::setDB($db);