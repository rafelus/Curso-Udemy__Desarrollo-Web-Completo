<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros', []);
    }

    public static function anuncios(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function anuncio(Router $router){
        $id = validarID('/anuncios');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $respuesta = $_POST['contacto'];

            // Crear instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'bb558a8c18642f';
            $mail->Password = '842cfdd471bf5c';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';

            // Habilitar HMTL
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = "<html>";
            $contenido .= "<p>Nombre: ".$respuesta['nombre']."</p>";
            if($respuesta['formaContacto'] === 'email'){
                $contenido .= "<p>Email: ".$respuesta['email']."</p>";
            }else if($respuesta['formaContacto'] === 'telefono'){
                $contenido .= "<p>Telefono: ".$respuesta['telefono']."</p>";
                $contenido .= "<p>Fecha: ".$respuesta['fecha']."</p>";
                $contenido .= "<p>Hora: ".$respuesta['hora']."</p>";
            }
            $contenido .= "<p>Mensaje: ".$respuesta['mensaje']."</p>";
            $contenido .= "<p>Interés: ".$respuesta['opciones']."</p>";
            $contenido .= "<p>Precio o presupuesto: ".$respuesta['presupuesto']."&euro;</p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;

            // Enviar el email
            if($mail->send()){
                // Redireccionar al usuario
                header("Location: /contacto?resultado=4");
            }else{
                header("Location: /contacto?resultado=5");
            };

        }

        $router->render('paginas/contacto', []);
    }
}