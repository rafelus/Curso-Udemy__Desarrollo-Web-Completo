<fieldset>
    <legend>Información general</legend>
    <label for="titulo">Titulo: </label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo propiedad" value="<?php echo s($propiedad->titulo)?>">
    <label for="precio">Precio: </label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo s($propiedad->precio)?>">
    <label for="imagen">Imagen: </label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if($propiedad->imagen): ?>
        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
    <?php endif ?>

    <label for="descripcion">Descripción: </label>
    <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion)?></textarea>
</fieldset>
<fieldset>
    <legend>Información Propiedad</legend>
    <label for="habitaciones">Habitaciones: </label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej:3" value="<?php echo s($propiedad->habitaciones)?>" min='1'>
    <label for="wc">Baños: </label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="Ej:3" value="<?php echo s($propiedad->wc)?>" min='1'>
    <label for="estacionamiento">Capacidad estacionamiento: </label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ej:3" value="<?php echo s($propiedad->estacionamiento)?>" min='0'>
</fieldset>
<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[vendedorId]">
        <option value="" disabled selected>--Seleccione Vendedor--</option>
        <?php while($row = mysqli_fetch_assoc($resulVendedores)): ?>
        <option <?php echo $propiedad->vendedorId === $row['id'] ? 'selected' : '';?> value="<?php echo $row['id']?>">
            <?php echo $row['nombre'].' '. $row['apellido'] ?>
        </option>
        <?php endwhile ?>
    </select>
</fieldset>