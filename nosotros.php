<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp"> 
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg"> 
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate rem optio autem dolore pariatur suscipit atque neque doloribus id magnam temporibus error nisi voluptas consequuntur aliquam, velit reprehenderit obcaecati, vel dolorum esse consectetur. Laborum aliquid modi est deleniti delectus aut sed, dolorem voluptas ipsa, excepturi ea pariatur omnis deserunt tempore nemo maxime illo eveniet velit? Praesentium tenetur, neque quidem repudiandae nesciunt officiis ab quae et dolores molestiae quo ullam ex! Recusandae nostrum optio voluptatem animi debitis assumenda aspernatur. Officiis, laborum laboriosam? Sapiente blanditiis sequi, vitae ea velit nesciunt fuga? Error, culpa harum ipsa nisi libero porro voluptate magnam esse repudiandae!</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam, excepturi ipsam. Architecto et rem tempora eligendi dolorem vitae deserunt corporis nulla autem deleniti qui porro placeat quod ducimus enim iste est dignissimos voluptatem, dicta a officiis rerum. Voluptatem sequi cum magni et sint, recusandae assumenda architecto quas nihil veritatis quidem.</p>
            </div>
        </div>
    </main> 

    
    <section class="contenedor seccion">
        <h2>Mas Sobre Nosotros</h2>
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
    </section> <!--.main -->
<?php
    incluirTemplate('footer');
    
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>