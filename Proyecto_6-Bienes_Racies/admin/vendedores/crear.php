<?php 
require '../../includes/app.php';
use App\Vendedor;

// Comprobar estado autenticado de sesión
estadoAutenticado();

$vendedor = new Vendedor;

// Arreglo con mensajes de Error
$errores = Vendedor::getErrores();

// Ejecuta el codigo despues de que el usuario envie el formulario
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar los atributos
    $errores = $vendedor->validar();
    
    // Revisar lista de errores
    if(empty($errores)){
        $vendedor->crear();
    }
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>

    <?php foreach($errores as $error): ;?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach ?>

    <form class="formulario" method="POST" action="/admin/vendedores/crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_vendedores.php'?>
        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
    </form>
</main>

<?php 
incluirTemplate('footer');
?>