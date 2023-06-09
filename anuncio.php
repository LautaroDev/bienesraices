<?php
    $id=  $_GET['id'];
    $id= filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('Location: index.php');
    }

    //importar conexion
    require 'includes/config/database.php';
    $db = conectarDB();
    //consultar
    $query = "SELECT * FROM propiedades WHERE id = {$id}";
    //obtener resultado
    $resultado = mysqli_query($db, $query);
    if($resultado->num_rows === 0 ){
        header('Location: index.php');
    }
    $propiedad = mysqli_fetch_assoc($resultado);

    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1><?php echo $propiedad['titulo'];?> </h1>

            <img loading="lazy" width="200" height="300" src="/bienesraices/imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen de la propíedad">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad['precio'];?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="estacionamiento wc">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>

            <p><?php echo $propiedad['descripcion'];?></p>
        </div>
    </main>
<?php
    incluirTemplate('footer');    
    //cerrar la conexion (opcional)
    mysqli_close($db);
?>
</body>
</html>