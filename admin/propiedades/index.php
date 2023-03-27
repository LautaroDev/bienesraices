<?php

    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('Location: ../../index.php');
    }

    //Base de datos 
    //importar la conexion 
    require '../../includes/config/database.php';
    $db = conectarDB();

    //escribir el query 
    $query = "SELECT * FROM propiedades";

    //consultar DB
    $resultadoConsulta = mysqli_query($db, $query);


    //Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;  //este placeholder 

if ($_SERVER['REQUEST_METHOD'] === 'POST' ){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT); 

    if($id){
        //eliminar archivo
        $query = "SELECT imagen  FROM propiedades WHERE id =  {$id};";
        $resultado =  mysqli_query($db,$query) ;
        $propiedad =  mysqli_fetch_assoc($resultado) ;

        unlink( '../../imagenes/' .  $propiedad['imagen']);

        //eliminar propiedad
        $query = "DELETE FROM propiedades WHERE id = {$id};";
        $resultado = mysqli_query($db, $query);
        if($resultado){
            header('location: ../propiedades/index.php?resultado=3');
        }
    } 
}


    //incluye template
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>
        <?php if($resultado == 1): ?> 
            <p class="alerta exito">Anuncio Crado Correctamente</p>
        <?php elseif ($resultado == 2): ?>   
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
            <?php elseif ($resultado == 3): ?>   
                <p class="alerta exito">Anuncio Eliminado  Correctamente</p>
        <?php endif;?> 

        <a href="/bienesraices/admin/propiedades/crear.php"class="boton boton-verde">nueva propeidad</a>

            <table class="propiedades">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                </thead>

                <tbody>  <!-- Mostrar los resultados -->
                    <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                        <tr>
                            <td> <?php echo $propiedad['id'] ?> </td>
                            <td><?php echo $propiedad['titulo'] ?></td>
                            <td><img src="../../imagenes/<?php echo $propiedad['imagen'];?>"  class="imagen-tabla" > </td>
                            <td>$<?php echo $propiedad['precio'] ?></td>
                            <td>
                                <form method="POST" class="w-100">
                                    <input type="hidden"
                                    name="id" 
                                    value="<?php echo $propiedad['id']?>">

                                    <input type="submit"  
                                    class="boton-rojo-block" 
                                    value="eliminar"></input>
                                </form>
                                <a href="../../admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']?>" class="boton-amarillo-block">Actualizar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </main>

<?php

    //cerrar la conexion (opcional)
    mysqli_close($db);
    incluirTemplate('footer');
    
?>
