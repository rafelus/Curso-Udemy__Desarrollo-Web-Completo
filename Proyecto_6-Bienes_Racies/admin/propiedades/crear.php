<?php 
// Comprobar estado autenticado de sesión
require '../../includes/app.php';
use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

estadoAutenticado();

// Base de Datos
$db = conectarDB();

// Consulta para obtener los vendedores
$consulVendedores = "SELECT * FROM vendedores";
$resulVendedores = mysqli_query($db, $consulVendedores);

// Arreglo con mensajes de Error
$errores = Propiedad::getErrores();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

// Ejecuta el codigo despues de que el usuario envie el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $propiedad = new Propiedad($_POST);
    
    // Generar nombre unico para la imagen
    $nombreImagen = md5(uniqid(rand(), true)).".jpg";

    if($_FILES['imagen']['tmp_name']){
    $manager = new ImageManager(Driver::class);
    $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
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

        $resultado = $propiedad->guardar();
        if($resultado){
        // Redireccionar al usuario
        header("Location: /admin?resultado=1");
        }
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
            <fieldset>
                <legend>Información general</legend>
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo?>">
                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio?>">
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                <label for="descripcion">Descripción: </label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion?></textarea>
            </fieldset>
            <fieldset>
                <legend>Información Propiedad</legend>
                <label for="habitaciones">Habitaciones: </label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej:3" value="<?php echo $habitaciones?>" min='1'>
                <label for="wc">Baños: </label>
                <input type="number" id="wc" name="wc" placeholder="Ej:3" value="<?php echo $wc?>" min='1'>
                <label for="estacionamiento">Capacidad estacionamiento: </label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej:3" value="<?php echo $estacionamiento?>" min='0'>
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                <select name="vendedorId">
                    <option value="" disabled selected>--Seleccione Vendedor--</option>
                    <?php while($row = mysqli_fetch_assoc($resulVendedores)): ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : '';?> value="<?php echo $row['id']?>">
                        <?php echo $row['nombre'].' '. $row['apellido'] ?>
                    </option>
                    <?php endwhile ?>
                </select>
            </fieldset>
            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>