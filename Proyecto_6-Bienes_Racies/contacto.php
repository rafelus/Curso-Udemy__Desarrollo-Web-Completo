<?php 
require 'includes/funciones.php';
incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="webp">
            <source srcset="build/img/destacada3.jpg" type="jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>
        <h2>Rellena el formulario de contacto</h2>
        <form class="formulario" action="">
            <fieldset>
                <legend>Información personal</legend>

                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu nombre">

                <label for="email">E-mail</label>
                <input id="email" type="email" placeholder="example@example.com">

                <label for="telefono">Telefono</label>
                <input id="telefono" type="tel" placeholder="Tu numero">

                <label for="mensaje">Mensaje: </label>
                <textarea id="mensaje" placeholder="Tu mensaje"></textarea>
            </fieldset>
            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="vende">Vende</option>
                    <option value="compra">Compra</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input id="presupuesto" type="number" placeholder="Tu precio o presupuesto">
            </fieldset>
            <fieldset>
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" id="contactar-telefono" type="radio" value="telefono">
                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" id="contactar-email" type="radio" value="email">
                </div>

                <p>Si eligió teléfono, eliga la fecha y la hora</p>
                <label for="fecha">Fecha:</label>
                <input id="fecha" type="date">

                <label for="hora">Hora:</label>
                <input id="hora" type="time" min="09:00" max="18:00">
            </fieldset>
            <input class="boton-verde" type="submit" value="Enviar">
        </form>
    </main>

    <?php 
    incluirTemplate('footer');
    ?>