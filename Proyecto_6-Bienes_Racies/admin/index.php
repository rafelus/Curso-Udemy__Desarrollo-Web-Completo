<?php 
require '../includes/app.php';
use App\Propiedad;
use App\Vendedor;

// Comprobar estado autenticado de sesión
estadoAutenticado();

// Implementar un metodo para obtener todas las propiedades
$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

// Muestra mensaje de exito al añadir una propiedad
$resultado = $_GET['resultado'] ?? null;

// CRUD Borrar
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        // Validar si el tipo es 'propiedad' o 'vendedor'
        if(validarTipoContenido($tipo)){
            if($tipo === 'propiedad'){
                $propiedad = Propiedad::find($id);
                // Eliminar la propiedad
                $propiedad->eliminar();
            }else if($tipo === 'vendedor'){
                $vendedor = Vendedor::find($id);
                // Eliminar el vendedor
                $vendedor->eliminar();
            }
        }
    }
}

// Incluye un template
incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php $mensaje = mostrarNotificacion(intval($resultado))?>
        <?php if($mensaje){ ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php } ?>

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propidedad</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la consulta a la base de datos-->
                <?php foreach($propiedades as $row): ?>
                <tr>
                    <td> <?php echo $row->id?></td>
                    <td> <?php echo $row->titulo?></td>
                    <td><img src="/imagenes/<?php echo $row->imagen?>" alt="imagen propiedad" class="imagen-tabla"></td>
                    <td> <?php echo $row->precio?>&euro;</td>
                    <td>
                        <a href="/admin/propiedades/actualizar.php?id=<?php echo $row->id?>" class="boton boton-amarillo-block">Actualizar Propidedad</a>
                        <form method="POST" class="w-100 ">
                            <input type="hidden" name="id" value="<?php echo $row->id?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton boton-rojo-block" value="Borrar Propiedad">
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="vendedores">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la consulta a la base de datos-->
                <?php foreach($vendedores as $row): ?>
                <tr>
                    <td> <?php echo $row->id?></td>
                    <td> <?php echo $row->nombre." ".$row->apellido?></td>
                    <td> <?php echo $row->telefono?></td>
                    <td>
                        <a href="/admin/vendedores/actualizar.php?id=<?php echo $row->id?>" class="boton boton-amarillo-block">Actualizar Vendedor</a>
                        <form method="POST" class="w-100 ">
                            <input type="hidden" name="id" value="<?php echo $row->id?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton boton-rojo-block" value="Borrar Vendedor">
                        </form>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    
    <?php 
    mysqli_close($db);
    incluirTemplate('footer');
    ?>