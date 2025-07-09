<?php
// Validar el ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
    header('Location: /');
}

// Importar la conexión
require __DIR__.'/../config/database.php';
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propiedades WHERE id = $id";

// Obtener los resultados
$resultado = mysqli_query($db, $query);
if(!$resultado->num_rows){
    header('Location: /');
}
$propiedad = mysqli_fetch_assoc($resultado);

?>
<h1><?php echo $propiedad['titulo']?></h1>
<img src="/imagenes/<?php echo $propiedad['imagen']?>" alt="anuncio" loading="lazy">
<div class="resumen-propiedad">
    <p class="precio"><?php echo $propiedad['precio']?> &euro;</p>
    <ul class="iconos-caracteristicas">
        <li>
            <img src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
            <p><?php echo $propiedad['wc']?></p>
        </li>
        <li>
            <img src="build/img/icono_estacionamiento.svg" alt="icono aparcamiento" loading="lazy">
            <p><?php echo $propiedad['estacionamiento']?></p>
        </li>
        <li>
            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio" loading="lazy">
            <p><?php echo $propiedad['habitaciones']?></p>
        </li>
    </ul>
    <p><?php echo $propiedad['descripcion']?></p>
</div>
<?php 
    mysqli_close($db); 
?>