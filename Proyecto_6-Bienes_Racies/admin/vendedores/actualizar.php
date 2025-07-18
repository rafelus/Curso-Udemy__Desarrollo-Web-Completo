<?php 
require '../../includes/app.php';
use App\Vendedor;

// Comprobar estado autenticado de sesión
estadoAutenticado();

// Obtener id del vendedor a actualizar y validar el id
$idVendedor = $_GET['id'];
$idVendedor = filter_var($idVendedor, FILTER_VALIDATE_INT);
if(!$idVendedor){
    header('Location: /admin');
}
// Consulta datos vendedor
$vendedor = Vendedor::find($idVendedor);

// Arreglo con mensajes de Error
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envie el formulario
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

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ;?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">

        <?php include '../../includes/templates/formulario_vendedores.php'?>
        <input type="submit" value="Guardar Cambios" class="boton boton-verde">
    </form>
</main>

<?php 
incluirTemplate('footer');
?>