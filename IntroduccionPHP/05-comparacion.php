<?php include 'includes/header.php';

$numero1 = 20;
$numero2 = 30;
$numero3 = 30;
$numero4 = "30";

var_dump($numero1 > $numero2);
echo "<br>";

var_dump($numero1 < $numero2);
echo "<br>";

var_dump($numero1 >= $numero2);
echo "<br>";

var_dump($numero1 <= $numero2);
echo "<br>";

var_dump($numero2 == $numero4);
echo "<br>";

var_dump($numero2 === $numero4);
echo "<br>";

// Devuelve -1 si el numero de la izquierda es menor que el de la derecha
var_dump($numero1 <=> $numero2);
echo "<br>";

// Devuelve 1 si el numero de la izquierda es mayor que el de la derecha
var_dump($numero2 <=> $numero1);
echo "<br>";

// Devuelve 0 si ambos numeros son iguales
var_dump($numero2 <=> $numero3);
echo "<br>";

include 'includes/footer.php';