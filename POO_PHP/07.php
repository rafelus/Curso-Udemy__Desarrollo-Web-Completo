<?php include 'includes/header.php';

// Polimorfismo
interface TransporteInterfaz{
    public function getInfo() : string;
    public function getRuedas() : int;
}
class Transporte implements TransporteInterfaz{
    public function __construct(protected int $ruedas, protected int $capacidad){}
    
    public function getInfo() : string {
        return "El transporte tiene $this->ruedas ruedas y espacio para $this->capacidad pasajeros";
    }
    public function getRuedas(): int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz{
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $color){}
    
    public function getInfo() : string {
        return "El automóvil tiene $this->ruedas ruedas, espacio para $this->capacidad pasajeros y es de color $this->color.";
    }
    public function getColor() : string {
        return "El coche es de color $this->color.";
    }
}

$transporte = new Transporte(2, 1);
$coche = new Automovil(4, 4, 'rojo');

echo $transporte->getInfo();
echo '<br>';
echo $coche->getInfo();
echo '<br>';
echo $coche->getColor();
echo '<br>';

include 'includes/footer.php';