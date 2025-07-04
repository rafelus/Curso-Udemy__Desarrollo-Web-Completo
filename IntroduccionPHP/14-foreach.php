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

foreach($productos as $producto){ ?>
    <ul>
        <p>Producto</p>
        <p>Nombre: <?php echo($producto['nombre']);?></p>
        <p>Precio: <?php echo($producto['precio']);?></p>
        <p>Disponibilidad: <?php echo($producto['disponible']) ? 'DISPONIBLE':'NO DISPONIBLE'?></p>
    </ul>
<?php
}

include 'includes/footer.php';