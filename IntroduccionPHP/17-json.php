<?php include 'includes/header.php';

$productos = [
    [
        'nombre' => 'Tablet',
        'precio' => 200,
        'disponible' => true,
    ],
    [
        'nombre' => 'Television',
        'precio' => 800,
        'disponible' => true,
    ],
    [
        'nombre' => 'Monitor Curvo',
        'precio' => 400,
        'disponible' => false,
    ]
];
echo '<pre>';
var_dump($productos);
$json = json_encode($productos);
var_dump($json);
$json_array = json_decode($json);
var_dump($json_array);
echo '</pre>';

include 'includes/footer.php';