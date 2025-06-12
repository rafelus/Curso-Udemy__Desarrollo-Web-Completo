<?php include 'includes/header.php';

$clientes1 = [];
$clientes2 = array();
$clientes3 = array('Pedro', 'Juan', 'Karen');

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premium'
    ],
];

// Empty - Revisa si un array esta vacio
var_dump(empty($clientes1));
echo '<br>';
var_dump(empty($clientes3));
echo '<br>';

// Isset - Revisa si un array existe
var_dump(isset($clientes4));
echo '<br>';
var_dump(isset($clientes1));
echo '<br>';
var_dump(isset($clientes3));
echo '<br>';

// Isset - Tambien revisa si existe una propiedad en un array asociativo
var_dump(isset($cliente['saldo']));
echo '<br>';
var_dump(isset($cliente['informacion']['tipo']));
echo '<br>';

include 'includes/footer.php';