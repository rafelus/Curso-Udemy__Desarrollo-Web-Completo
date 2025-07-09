<?php
// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();

// Crear usuario y contraseña
$email = 'correo@correo.com';
$password = '123456';

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario;
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash');";


// Agregarlo a la base de datos
exit;
mysqli_query($db, $query);
mysqli_close($db);
?>