<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;

        // Array rutas protegitas
        $rutasProtegidas = ['/admin', '/propiedades/*', '/vendedores/*'];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else if($metodo === 'POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }
        // Proteger las rutas
        foreach($rutasProtegidas as $ruta){
            if(fnmatch($ruta, $urlActual) && !$auth){
                header('Location: /');
                exit;
            }
        }


        if($fn){
            // La URL existe y tiene una función asociada
            call_user_func($fn, $this);
        }else{
            echo 'Página no encontrada';
        }
    }

    // Mostrar una VISTA
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;
        }
        ob_start(); // Almacena en memoria

        include_once __DIR__."/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el buffer
        include_once __DIR__."/views/layout.php";
    }
}