<?php
namespace App;

class Propiedad {
    // Base de Datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    // Errores
    protected static $errores =[];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Insertar en la Base de Datos
        $query = "INSERT INTO propiedades (";
        $query .= join(", ", array_keys($atributos));
        $query .= ") VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);
        if($resultado){
        // Redireccionar al usuario
        header("Location: /admin?resultado=1");
        }
    }

    public function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Validacion
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }
        if(!$this->imagen){
            self::$errores[] = "Debes cargar una imagen";
        }
        if(strlen($this->descripcion)<50){
            self::$errores[] = "Debes añadir una descripción superior a 50 caracteres";
        }
        if(!$this->habitaciones){
            self::$errores[] = "Debes añadir un número de habitaciones";
        }
        if(!$this->wc){
            self::$errores[] = "Debes añadir un número de baños";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "Debes añadir un número de plazas de estacionamiento";
        }
        if(!$this->vendedorId){
            self::$errores[] = "Debes elegir un vendedor";
        }
        return self::$errores;
    }

    public function setImagen($imagen){
        if($imagen){
            $this->imagen = $imagen;
        }
    }
}
?>