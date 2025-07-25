<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>
    <?php foreach($errores as $error): ;?>
    <div class="alerta error">
        <?php echo $error ?>
    </div>
<?php endforeach ?>
    <form class="formulario" method="POST" action="/login">
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