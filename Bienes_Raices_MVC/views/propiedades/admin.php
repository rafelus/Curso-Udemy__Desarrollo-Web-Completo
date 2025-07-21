<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php 
        if($resultado){
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php }
        } 
    ?>

    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propidedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo">Nuevo Vendedor</a>

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
                    <a href="/propiedades/actualizar?id=<?php echo $row->id?>" class="boton boton-amarillo-block">Actualizar Propidedad</a>
                    <form method="POST" class="w-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $row->id?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton boton-rojo-block" value="Borrar Propiedad">
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>