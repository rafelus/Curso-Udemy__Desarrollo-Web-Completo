<?php 
require "funciones.php";
require "config/database.php";
require __DIR__."/../vendor/autoload.php";

use Model\ActiveRecord;

// Conectarnos a las Base de Datos
$db = conectarDB();

ActiveRecord::setDB($db);