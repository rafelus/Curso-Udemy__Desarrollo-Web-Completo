<?php include 'includes/header.php';

// Herencia
class Transporte{
    public function __construct(protected int $ruedas, protected int $capacidad){}
    
    public function getInfo() : string {
        return "El transporte tiene $this->ruedas ruedas y espacio para $this->capacidad pasajeros";
    }
}

class Bicicleta extends Transporte{
}

class Automovil extends Transporte{
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision){}

    public function getTransmision() : string {
        return $this->transmision;
    }
}

$bicicleta = new Bicicleta(2, 1);
echo $bicicleta->getInfo();
echo '<hr>';

$coche = new Automovil(4, 5, 'Manual');
echo $coche->getInfo();
echo '<br>';
echo "El coche tiene una transmisión ".$coche->getTransmision().".";
echo '<hr>';

include 'includes/footer.php';