<?php include 'includes/header.php';

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'Premium'
    ],
];
echo '<pre>';
var_dump($cliente);
echo '</pre>';

echo($cliente['nombre']);
echo '<br>';
echo($cliente['informacion']['tipo']);
echo '<br>';

// Agregar nuevos elementos
$cliente['codigo'] = 123456789;
$cliente['informacion']['fechaAlta'] = '01-03-2002';
echo '<pre>';
var_dump($cliente);
echo '</pre>';

include 'includes/footer.php';