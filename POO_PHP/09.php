<?php include 'includes/header.php';

// Conectar a la Base de Datos con MYSQLI
$db = new mysqli('localhost','root', 'root', 'bienesraices_crud');

// Creamos la consulta
$query = "SELECT titulo, imagen FROM propiedades";

// Se prepara la consulta
$stmt = $db->prepare($query);

// Se ejecuta la consulta
$stmt->execute();

// Se crea la variable donde se guarda el resultado
$stmt->bind_result($titulo, $imagen);

// Se muestra el resultado
while($stmt->fetch()):
    echo $titulo;
    echo '<br>';
    echo $imagen;
    echo '<br>';
endwhile;

include 'includes/footer.php';