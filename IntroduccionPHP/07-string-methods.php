<?php include 'includes/header.php';

$nombreCliente = "Juan Pablo";

// Ver longitud string
echo strlen($nombreCliente);
echo "<br>";

// Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo $texto;
echo "<br>";

// Convetir en mayusculas
$texto = strtoupper($nombreCliente);
echo $texto;
echo "<br>";

// Convertir en minusculas
$texto = strtolower($nombreCliente);
echo $texto;
echo "<br>";

// Reemplazar caracteres en una cadena
$texto = str_replace("Juan", "J", $nombreCliente);
echo $texto;
echo "<br>";

// Revisa si un string existe o no y la posicion en la que aparece por primera vez
$texto = strpos($nombreCliente, "a");
echo $texto;
echo "<br>";

// Concatenar strings
$tipoCliente = "Premium";
echo "El cliente: ".$nombreCliente."<br>"."Es un cliente tipo: ".$tipoCliente;
echo "<br>";

$tipoCliente = "Premium";
echo "El cliente: {$nombreCliente}<br>Es un cliente tipo: {$tipoCliente}";
echo "<br>";

include 'includes/footer.php';