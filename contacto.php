<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.jpg" type="image/jpeg"> 
            <source srcset="build/img/destacada3.webp" type="image/webp"> 
            <img loading="lazy"  src="build/img/destacada3.jpg" alt="">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>  <!-- (campos relacionados) informacion personal -->
                <legend>informacion personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" placeholder="Tu email" id="email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono">

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje"></textarea>
            </fieldset>
            <fieldset>  <!-- (campos relacionados) informacion sobre Propiedad -->
                <legend>Informacion sobre la Propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select  id="opciones">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>  <!-- Al servidor se manda el value  -->
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Tu Precio o presupuesto" id="presupuesto">
            </fieldset>

            <fieldset>  <!-- (campos relacionados) Contacto -->
                <legend>Contacto</legend>

                <p>Como desea ser contactado</p>
                
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email">
                </div>

                <p>Si eligio telefono, elija la fecha y hora </p>

                
                <label for="fecha">Fecha:</label>
                <input type="date"  id="fecha">

                <label for="Hora">Hora:</label>
                <input type="time" id="Hora" min="09:00" max="18:00">
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde" >
        </form>
    </main>

<?php
    incluirTemplate('footer');
    
?>


    <script src="build/js/bundle.min.js"></script>
</body>
</html>