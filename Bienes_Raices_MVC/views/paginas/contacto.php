<main class="contenedor seccion contenido-centrado">
    <h1>Contacto</h1>
    <?php 
    $resultado = $_GET['resultado'] ?? '';
    if($resultado === "4"){
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje){ ?>
            <p class="alerta exito"><?php echo s($mensaje) ?></p><br>
        <?php }
    } else if($resultado === "5"){
        $mensaje = mostrarNotificacion(intval($resultado));
        if($mensaje){ ?>
            <p class="alerta error"><?php echo s($mensaje) ?></p><br>
        <?php }
    }
    ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="webp">
        <source srcset="build/img/destacada3.jpg" type="jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>
    <h2>Rellena el formulario de contacto</h2>
    <form class="formulario" action="/contacto" method="POST">
        <fieldset>
            <legend>Información personal</legend>

            <label for="nombre">Nombre</label>
            <input id="nombre" type="text" placeholder="Tu nombre" name="contacto[nombre]" required>

            <label for="mensaje">Mensaje: </label>
            <textarea id="mensaje" placeholder="Tu mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select id="opciones" name="contacto[opciones]" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="vender">Vender</option>
                <option value="comprar">Comprar</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input id="presupuesto" type="number" placeholder="Tu precio o presupuesto" name="contacto[presupuesto]" required>
        </fieldset>
        <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[formaContacto]" id="contactar-telefono" type="radio" value="telefono" required>
                <label for="contactar-email">E-mail</label>
                <input name="contacto[formaContacto]" id="contactar-email" type="radio" value="email" required>
            </div>

            <div id="contacto"></div>

        </fieldset>
        <input class="boton-verde" type="submit" value="Enviar">
    </form>
</main>