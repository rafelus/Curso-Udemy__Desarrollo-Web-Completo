<?php 
// Base de Datos
require '../../includes/config/database.php';
$db = conectarDB();

// Consulta para obtener los vendedores
$consulVendedores = "SELECT * FROM vendedores";
$resulVendedores = mysqli_query($db, $consulVendedores);

// Arreglo con mensajes de Error
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

// Ejecuta el codigo despues de que el usuario envie el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $creado = date('Y/m/d');
    if (isset($_POST['vendedor'])){
        $vendedorId = $_POST['vendedor'];
    }

    if(!$titulo){
        $errores[] = "Debes añadir un titulo";
    }
    if(!$precio){
        $errores[] = "Debes añadir un precio";
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
        // Insertar en la Base de Datos
        $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,creado,vendedores_Id) 
        VALUES ('$titulo','$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId');";
        $resultado = mysqli_query($db, $query);
        if($resultado){
            // Redireccionar al usuario
            header("Location: /admin");
        }
    }
}

require '../../includes/funciones.php';
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

        <form class="formulario" method="POST" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Información general</legend>
                <label for="titulo">Titulo: </label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo propiedad" value="<?php echo $titulo?>">
                <label for="precio">Precio: </label>
                <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $precio?>">
                <label for="imagen">Imagen: </label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">
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