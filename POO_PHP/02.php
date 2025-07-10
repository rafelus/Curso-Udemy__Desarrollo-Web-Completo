<?php 
declare(strict_types = 1);
include 'includes/header.php';

// ENCAPSULACION

class Producto {
    protected $nombre;                                 
    protected $precio;                                 
    protected $disponible;                             

    public function __construct(string $nombre, int $precio, bool $disponible)
    {
        $this->nombre = $nombre;                    
        $this->precio = $precio;                    
        $this->disponible = $disponible;         
    }

    public function mostrarProducto(){
        echo "El producto '$this->nombre' tiene un precio de $this->precio euros.";
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        return $this->nombre = $nombre;
    }
}

// Instanciar una clase
$producto1 = new Producto('Tablet', 200, true);
$producto1->mostrarProducto();
echo '<br>';

echo $producto1->getNombre();
echo '<br>';
$producto1->setNombre('Laptop');
echo $producto1->getNombre();
echo '<br>';

$producto2 = new Producto('Monitor Curvo', 300, true);
$producto2->mostrarProducto();
echo '<br>';

echo $producto2->getNombre();
echo '<br>';

include 'includes/footer.php';