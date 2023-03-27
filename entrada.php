<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía de decoracion para tu hogar </h1>


        <picture>
            <source srcset="build/img/blog1.jpg" type="image/jpeg"> 
            <source srcset="build/img/blog1.webp" type="image/webp"> 
            <img loading="lazy" width="200" height="300" src="build/img/blog1.jpg" alt="imagen de la propíedad">
        </picture>

        <p class="informacion-meta">Escrito el: <span>12/12/2022</span> por: <samp>Admin</samp></p>


            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Autem minima eaque recusandae quos voluptatibus veritatis blanditiis aliquam deserunt non rerum iusto, cum repellat omnis, cupiditate accusantium suscipit? Quasi repellat harum quaerat modi aspernatur quo placeat itaque quam, vero odio. Quae, eaque obcaecati inventore dignissimos voluptatem animi exercitationem accusamus dolorum, blanditiis ut iure, commodi labore esse. Animi rerum saepe delectus consequuntur explicabo sit aspernatur nisi nesciunt dolor corrupti repellat debitis voluptas corporis quos voluptate, ipsa asperiores, voluptates accusamus quibusdam quasi ad! Saepe, mollitia modi quia, est provident cumque fugiat illo, praesentium perspiciatis accusantium architecto quibusdam deserunt debitis tempora sit fugit recusandae?</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
    
?>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>