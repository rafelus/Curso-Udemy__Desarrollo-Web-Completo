<?php 
require '../includes/app.php';
use App\Propiedad;

// Comprobar estado autenticado de sesión
estadoAutenticado();

// Implementar un metodo para obtener todas las propiedades
$propiedades = Propiedad::all();

// Muestra mensaje de exito al añadir una propiedad
$resultado = $_GET['resultado'] ?? null;

// CRUD Borrar
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if($id){
        // Eliminar la imagen
        $query = "SELECT imagen FROM propiedades WHERE id = $id";
        $consulta = mysqli_query($db, $query);
        $imagenPropiedad = mysqli_fetch_assoc($consulta);
        unlink('../imagenes/'.$imagenPropiedad['imagen']);
        // Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id = $id";
        $consulta = mysqli_query($db, $query);
        if($consulta){
            header('Location: /admin?resultado=3');
        }
    }
}

// Incluye un template
incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>
        <?php if($resultado == 1): ?>
            <p class="alerta exito">Propiedad Añadida Correctamente</p>
        <?php elseif($resultado == 2): ?>
            <p class="alerta exito">Propiedad Actualizada Correctamente</p>
        <?php elseif($resultado == 3): ?>
            <p class="alerta exito">Propiedad Borrada Correctamente</p>
        <?php endif ?>
        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propidedad</a>

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
                            <input type="submit" class="boton boton-rojo-block" value="Borrar Propiedad">
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