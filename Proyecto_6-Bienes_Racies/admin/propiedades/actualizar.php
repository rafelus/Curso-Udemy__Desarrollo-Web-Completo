<?php 
// Comprobar estado autenticado de sesión
require '../../includes/funciones.php';
$auth = estadoAutenticado();
if(!$auth){
    header('Location: /');
}

// Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta para obtener los vendedores
$consulVendedores = "SELECT * FROM vendedores";
$resulVendedores = mysqli_query($db, $consulVendedores);

// Obtener id de la propiedad a actualizar y validar el id
$idPropiedad = $_GET['id'];
$idPropiedad = filter_var($idPropiedad, FILTER_VALIDATE_INT);
if(!$idPropiedad){
    header('Location: /admin');
}
// Consulta datos propiedad
$consulPropiedad = "SELECT * FROM propiedades WHERE id = $idPropiedad";
$resulPropiedad = mysqli_query($db, $consulPropiedad);

$propiedad = mysqli_fetch_assoc($resulPropiedad);

// Arreglo con mensajes de Error
$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$imagenPropiedad = $propiedad['imagen'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];

// Ejecuta el codigo despues de que el usuario envie el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $creado = date('Y/m/d');
    if (isset($_POST['vendedor'])){
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    }
    // Asignar files a la variable imagen
    $imagen = $_FILES['imagen'];
    $pesoImgKB = 1000*1000;

    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "Debes añadir un precio";
    }
    if($imagen['size'] > $pesoImgKB){
        $errores[] = "La imagen es demasiado grande";
    }
    if(strlen($descripcion)<50){
        $errores[] = "Debes añadir una descripción superior a 50 caracteres";
    }
    if(!$habitaciones){
        $errores[] = "Debes añadir un número de habitaciones";
    }
    if(!$wc){
        $errores[] = "Debes añadir un número de baños";
    }
    if(!$estacionamiento){
        $errores[] = "Debes añadir un número de plazas de estacionamiento";
    }
    if(!$vendedorId){
        $errores[] = "Debes elegir un vendedor";
    }

    // Revisar lista de errores
    if(empty($errores)){
        // /** Subida de archivos */
        // Crear una carpeta
        $carpetaImagenes = '../../imagenes/';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        $nombreImagen = '';
        // Eliminar la imagen previa
        if($imagen['name']){
            unlink($carpetaImagenes.$imagenPropiedad);
            // Generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)).".jpg";
            // Añadir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
        }else{
            $nombreImagen = $imagenPropiedad;
        }

        // Actualizar en la Base de Datos
        $query = "UPDATE propiedades SET titulo = '$titulo', precio = '$precio', imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, wc = $wc, estacionamiento = $estacionamiento, vendedores_id = $vendedorId WHERE id = $idPropiedad";
        $resultado = mysqli_query($db, $query);
        if($resultado){
            // Redireccionar al usuario
            header("Location: /admin?resultado=2");
        }
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
            <fieldset>
                <legend>Información general</legend>
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo?>">
                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio?>">
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen" >
                <img src="/imagenes/<?php echo $imagenPropiedad?>" alt="imagen propiedad" class="imagen-small">
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
                <select name="vendedor">
                    <option value="" disabled selected>--Seleccione Vendedor--</option>
                    <?php while($row = mysqli_fetch_assoc($resulVendedores)): ?>
                    <option <?php echo $vendedorId=== $row['id'] ? 'selected' : '';?> value="<?php echo $row['id']?>">
                        <?php echo $row['nombre'].' '. $row['apellido'] ?>
                    </option>
                    <?php endwhile ?>
                </select>
            </fieldset>
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>