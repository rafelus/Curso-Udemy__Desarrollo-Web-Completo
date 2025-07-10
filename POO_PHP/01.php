<?php 
declare(strict_types = 1);
include 'includes/header.php';

// Definir una clase
class Producto {
    public $nombre;                                 // esto desaparece en el nuevo constructor de PHP v8
    public $precio;                                 // esto desaparece en el nuevo constructor de PHP v8
    public $disponible;                             // esto desaparece en el nuevo constructor de PHP v8

    // public function __construct(public string $nombre, public int $precio, public bool $disponible){} --- nueva forma a partir PHP v8

    public function __construct(string $nombre, int $precio, bool $disponible)
    {
        $this->nombre = $nombre;                    // esto desaparece en el nuevo constructor de PHP v8
        $this->precio = $precio;                    // esto desaparece en el nuevo constructor de PHP v8
        $this->disponible = $disponible;            // esto desaparece en el nuevo constructor de PHP v8
    }

    public function mostrarProducto(){
        echo "El producto '$this->nombre' tiene un precio de $this->precio euros.";
    }
}

// Instanciar una clase
$producto1 = new Producto('Tablet', 200, true);
$producto1->mostrarProducto();

echo '<pre>';
var_dump($producto1);
echo '</pre>';

$producto2 = new Producto('Monitor Curvo', 300, true);
$producto2->mostrarProducto();

echo '<pre>';
var_dump($producto2);
echo '</pre>';

include 'includes/footer.php';