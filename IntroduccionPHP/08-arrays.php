<?php include 'includes/header.php';

$carrito1 = [];
var_dump($carrito1);
echo '<br>';

$carrito2 = array();
var_dump($carrito2);
echo '<br>';

// "<pre>" Util para ver el contenido de un array de forma estructurada
$carrito1 = ['Tablet','Television', 'Ordenador'];
echo '<pre>';
var_dump($carrito1);
echo '</pre>';

// Acceder a un elemento de un array
var_dump($carrito1[2]);
echo '<br>';

// Agregar elementos a un array
$carrito1[3] = "Nuevo producto";
echo '<pre>';
var_dump($carrito1);
echo '</pre>';

// Añadir un elemento al final
array_push($carrito1, "Mouse");
echo '<pre>';
var_dump($carrito1);
echo '</pre>';

// Añadir un elemento al principio
array_unshift($carrito1, "Teclado");
echo '<pre>';
var_dump($carrito1);
echo '</pre>';

include 'includes/footer.php';