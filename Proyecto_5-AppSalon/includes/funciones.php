<?php

function obtenerServicios (){
    try {
        // Importar credecnciales de conexion
        require 'database.php';
        // Consulta sql
        $query = "SELECT * FROM servicios;";
        // Realizar la consulta
        $result = mysqli_query($conexion, $query);
        return $result;
        //Acceder a los resultados
        // echo '<pre>';
        // var_dump(mysqli_fetch_assoc($result));
        // echo '</pre>';
        //Cerrar la conexion
        mysqli_close($conexion);
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
obtenerServicios();