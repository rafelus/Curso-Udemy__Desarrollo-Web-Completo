<?php

namespace Controller;

use MVC\Router;
use Model\Vendedor;


class VendedorController {
    public static function crear(Router $router){
        $vendedor = new Vendedor;
        // Arreglo con mensajes de Error
        $errores = Vendedor::getErrores();

        // Metodo POST para crear
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar los atributos
            $errores = $vendedor->validar();
            
            // Revisar lista de errores
            if(empty($errores)){
                $vendedor->crear();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarID('/admin');
        $vendedor = Vendedor::find($id);
        // Arreglo con mensajes de Error
        $errores = Vendedor::getErrores();

        // Metodo POST para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Asignar los atributos
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);

            // Validacion
            $errores = $vendedor->validar();

            // Revisar lista de errores
            if(empty($errores)){
                // Actualizar en la Base de Datos
                $vendedor->actualizar();
            }
        }

        $router->render('/vendedores/actualizar',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}