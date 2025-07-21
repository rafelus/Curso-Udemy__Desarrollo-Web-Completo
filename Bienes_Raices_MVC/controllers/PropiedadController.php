<?php

namespace Controller;

use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;


class PropiedadController {
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de Error
        $errores = Propiedad::getErrores();

        // Metodo POST para crear
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $propiedad = new Propiedad($_POST['propiedad']);
            
            // Generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
            
            // Setear la imagen 
            // Realiza un resize a la imagen con itervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Validar los atributos
            $errores = $propiedad->validar();
            
            // Revisar lista de errores
            if(empty($errores)){
                /** Subida de archivos */
                // Crear una carpeta
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES.$nombreImagen);

                $propiedad->crear();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarID('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();
        // Arreglo con mensajes de Error
        $errores = Propiedad::getErrores();

        // Metodo POST para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            // Validacion
            $errores = $propiedad->validar();

            // Subida de archivos
            // Generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";

            // Setear la imagen 
            // Realiza un resize a la imagen con itervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
            $manager = new ImageManager(Driver::class);
            $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
            $propiedad->setImagen($nombreImagen);
            }

            // Revisar lista de errores
            if(empty($errores)){
                // Almacenar la imagen
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $imagen->save(CARPETA_IMAGENES.$nombreImagen);
                }
                // Actualizar en la Base de Datos
                $propiedad->actualizar();
            }
        }

        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}