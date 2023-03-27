<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>

    <main class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/icono1.svg" alt="icono de seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse aliquid iste blanditiis ratione rem illo numquam, quis iusto cupiditate eum architecto doloribus ad! Vel iure quam culpa aspernatur fugit aliquid! Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="icono">
                <img src="build/icono2.svg" alt="icono de precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse aliquid iste blanditiis ratione rem illo numquam, quis iusto cupiditate eum architecto doloribus ad! Vel iure quam culpa aspernatur fugit aliquid! Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="icono">
                <img src="build/icono3.svg" alt="icono de tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse aliquid iste blanditiis ratione rem illo numquam, quis iusto cupiditate eum architecto doloribus ad! Vel iure quam culpa aspernatur fugit aliquid! Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </main> <!--.main -->

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta </h2>
        
        <?php
        $limite = 3;
        include 'includes/template/anuncios.php';
        ?> 

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver Todas</a>
        </div>
    </section> <!--.section -->

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>

        <a href="contacto.html" class="boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type= "image/webp">
                        <source srcset="build/img/blog1.jpg" type= "image/jpeg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa </h4>
                        <p class="informacion-meta">Escrito el: <span>12/12/2022</span>
                            por:<span>Admin</span>
                        </p>
                        <p>
                            Consejos para construir una terraza en el techo de tu casa con los mejores materiales ya horrando dinero
                        </p>
                    </a>
                </div>
            </article>
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type= "image/webp">
                        <source srcset="build/img/blog2.jpg" type= "image/jpeg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog2">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>12/12/2022</span>
                            por:<span>Admin</span>
                        </p>
                        <p>
                            Maximisa el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una exelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>  <!-- dentro de esta etiqueta se suele colocar citas o frases dichas por personas  -->
                <p>- Lautaro Encalado</p>
            </div>
        </section>

    </div>

    <?php
    incluirTemplate('footer');
    
?>

</body>
</html>