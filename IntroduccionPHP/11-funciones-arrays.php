<?php include 'includes/header.php';

// in_array - buscar elementos en un array
$carrito = ['Tablet', 'Ordenador','Television'];
var_dump(in_array('Tablet', $carrito));
echo '<br>';

// Ordenar elementos de un array
$numeros = [1,3,5,2,5,23,53,5,6,9];
sort($numeros);     // de menor a mayor
echo '<pre>';
var_dump($numeros);
echo '</pre>';

rsort($numeros);     // de mayor a menor
echo '<pre>';
var_dump($numeros);
echo '</pre>';

// Ordenar array asociativo
$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premium'
    ],
];
asort($cliente);    // 'asort' ordena los valores primero los numeros y despues los string alfabeticamente
echo '<pre>';
var_dump($cliente);
echo '</pre>';

ksort($cliente);    // 'ksort' ordena las llaves primero los numeros y despues los string alfabeticamente
echo '<pre>';
var_dump($cliente);
echo '</pre>';

include 'includes/footer.php';