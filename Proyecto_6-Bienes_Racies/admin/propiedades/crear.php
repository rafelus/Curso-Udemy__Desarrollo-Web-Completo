<?php 
require '../../includes/app.php';
use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

// Comprobar estado autenticado de sesión
estadoAutenticado();

$propiedad = new Propiedad();

// Consulta para tener los vendedores
$consulVendedores = "SELECT * FROM vendedores";
$resulVendedores = mysqli_query($db, $consulVendedores);

// Arreglo con mensajes de Error
$errores = Propiedad::getErrores();

// Ejecuta el codigo despues de que el usuario envie el formulario
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

        $propiedad->guardar();
    }
}

incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>
        <a href="/admin/index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ;?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php'?>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>