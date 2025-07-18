<?php include 'includes/header.php';

// Interfaces
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

include 'includes/footer.php';