<?php include 'includes/header.php';

function usuarioAutenticado(bool $autenticado) : string{
    if($autenticado){
        return 'El usuario esta autenticado';
    }else{
        return 'El usuario no esta autenticado';
    }
}

$usuario = true;
$resultado = usuarioAutenticado($usuario);
echo $resultado;

include 'includes/footer.php';