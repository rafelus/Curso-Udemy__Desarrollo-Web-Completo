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
    
    public function setImagen($imagen){
        // Eliminar la imagen previa
        if(isset($this->id)){
            $existenciaImagen = file_exists(CARPETA_IMAGENES.$this->imagen);
            if($existenciaImagen){
                unlink(CARPETA_IMAGENES.$this->imagen);
            }
        }
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    public function guardar(){
        if(isset($this->id)){
            // Actualizar registro
            $this->acttualizar();
        }else{
            // Crear registro
            $this->crear();
        }
    }

    public function crear(){
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

    public function acttualizar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Actualizar en la base de datos
        $valores= [];
        foreach($atributos as $key => $value){
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE propiedades SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id = ";
        $query .= self::$db->escape_string($this->id);
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);
        if($resultado){
        // Redireccionar al usuario
        header("Location: /admin?resultado=2");
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

    //Listar todos los registros
    public static function all(){
        $query = "SELECT * FROM propiedades";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }
    
    // Busca un registro por su ID
    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE id = $id";
        $resultado = self::consultarSQL($query);
        
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado-> fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new self;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria al actualizar
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}
?>