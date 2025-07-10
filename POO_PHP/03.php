<?php 
declare(strict_types = 1);
include 'includes/header.php';

// Métodos estáticos

class Producto {
    protected $nombre;
    protected $precio;
    protected $disponible;
    protected $imagen;

    public static $imagenPlaceholder = 'Imagen.jpg';

    public function __construct(string $nombre, int $precio, bool $disponible, string $imagen)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->disponible = $disponible;
        if($imagen){
            self::$imagenPlaceholder = $imagen;
        }
    }

    public static function obtenerProducto(){
        echo 'Obteniendo datos del producto...';
    }

    public static function obtenerImagenProducto(){
        return self::$imagenPlaceholder;
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
$producto1 = new Producto('Tablet', 200, true, '');
$producto1->mostrarProducto();
echo '<br>';

echo $producto1->getNombre();
echo '<br>';
$producto1->setNombre('Laptop');
echo $producto1->getNombre();
echo '<br>';
echo $producto1->obtenerImagenProducto();
echo '<br>';

$producto2 = new Producto('Monitor Curvo', 300, true, 'ImagenProducto2.jpg');
$producto2->mostrarProducto();
echo '<br>';

echo $producto2->getNombre();
echo '<br>';
echo $producto2->obtenerImagenProducto();
echo '<br>';

include 'includes/footer.php';