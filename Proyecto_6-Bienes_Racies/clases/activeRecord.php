<?php 

namespace App;

class ActiveRecord{
    // Base de Datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores
    protected static $errores =[];
    
    public static function setDB($database){
        self::$db = $database;
    }
    
    // Subida y actualizacion de imagen
    public function setImagen($imagen){
        // Eliminar la imagen previa
        if(!is_null($this->id)){
            $this->unSetImagen();
        }

        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Borrado de imagen
    public function unSetImagen(){
        // Eliminar la imagen
        $existenciaImagen = file_exists(CARPETA_IMAGENES.$this->imagen);
        if($existenciaImagen){
            unlink(CARPETA_IMAGENES.$this->imagen);
        }
    }

    public function crear(){
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Insertar en la Base de Datos
        $query = "INSERT INTO ". static::$tabla." (";
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

    public function actualizar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarDatos();

        // Actualizar en la base de datos
        $valores= [];
        foreach($atributos as $key => $value){
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE ". static::$tabla." SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id = ";
        $query .= self::$db->escape_string($this->id);

        $resultado = self::$db->query($query);
        if($resultado){
        // Redireccionar al usuario
        header("Location: /admin?resultado=2");
        }
    }

    // Eliminar un registro
    public function eliminar() {
        $query = "DELETE FROM ". static::$tabla." WHERE id = ";
        $query .= self::$db->escape_string($this->id);
        $resultado = self::$db->query($query);
        if($resultado){
            $this->unSetImagen();
            header('Location: /admin?resultado=3');
        }
    }

    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
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
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];

        return static::$errores;
    }

    //Listar todos los registros
    public static function all(){
        $query = "SELECT * FROM ".static::$tabla;
        $resultado = self::consultarSQL($query);

        return $resultado;
    }
    
    // Busca un registro por su ID
    public static function find($id){
        $query = "SELECT * FROM ".static::$tabla." WHERE id = $id";
        $resultado = self::consultarSQL($query);
        
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado-> fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

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