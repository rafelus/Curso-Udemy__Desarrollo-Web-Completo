<?php
// Importar la conexión
require 'includes/app.php';
$db = conectarDB();

// Autenticar el usuario
$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
        $errores[] = "Debes añadir un email válido";
    }
    if(!$password){
        $errores[] = "La contraseña es obligatoria";
    }
    if(empty($errores)){
        // Crear consulta
        $query = "SELECT * FROM usuarios WHERE email = '$email';";
        // Hacer la consulta
        $resultado = mysqli_query($db, $query);
        if($resultado->num_rows){
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);
            // Verificar el password
            $auth = password_verify($password, $usuario['password']);
            if($auth){
                // Inicio sesión
                session_start();
                // LLenar la sesion con info
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');
            }else{
                $errores[] = "Contraseña incorrecta";
            }
        }else{
            $errores[] = "El usuario no existe";
        }
    }
}

// Include el header
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error): ;?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
<?php endforeach ?>
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input id="email" name="email" type="email" placeholder="example@example.com">

            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Tu contraseña">
        </fieldset>
        <input class="boton boton-verde" type="submit" value="Iniciar sesión">
    </form>
</main>

<?php 
incluirTemplate('footer');
?>