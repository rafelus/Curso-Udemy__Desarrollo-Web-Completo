<?php 
require '../../includes/app.php';
use App\Propiedad;
use App\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

// Comprobar estado autenticado de sesión
estadoAutenticado();

// Consulta para tener los vendedores
$vendedores = Vendedor::all();

// Obtener id de la propiedad a actualizar y validar el id
$idPropiedad = $_GET['id'];
$idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);
if(!$idPropiedad){
    header('Location: /admin');
}
// Consulta datos propiedad
$propiedad = Propiedad::find($idPropiedad);

// Arreglo con mensajes de Error
$errores = Propiedad::getErrores();

// Ejecuta el codigo despues de que el usuario envie el formulario
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

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ;?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        
        <?php include '../../includes/templates/formulario_propiedades.php'?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>

<?php 
incluirTemplate('footer');
?>