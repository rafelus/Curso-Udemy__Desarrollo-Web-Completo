<?php include 'includes/header.php';

// Conectar a la Base de Datos con PDO
$db = new PDO('mysql:host=localhost; dbname=bienesraices_crud', 'root', 'root');

// Creamos la consulta
$query = "SELECT titulo, imagen FROM propiedades";

// Se prepara la consulta
$stmt = $db->prepare($query);

// Se ejecuta la consulta
$stmt->execute();

// Se guarda el resultado
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Se muestra el resultado
foreach($resultado as $propiedad):
    echo $propiedad['titulo'];
    echo '<br>';
    echo $propiedad['imagen'];
    echo '<br>';
endforeach;

include 'includes/footer.php';