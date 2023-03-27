
<?php
        require '../../includes/funciones.php';
        $auth = estaAutenticado();
    
        if (!$auth) {
            header('Location: ../../index.php');
        }
    

    //Base de datos 
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Consultar para obtener los vendedores

    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    //Arreglo con mensajes de errores
    $errores = [];


    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedores_id = '';
    

    //Ejecutar el codigo despues de que el usuario envia el formulario 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {




        /*         
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>"; 
        */


        
        echo "<pre>";
        var_dump($_FILES);
        echo "</pre>";        


    $titulo = mysqli_real_escape_string( $db,  $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db,  $_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db,  $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db,  $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string( $db,  $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db,  $_POST['estacionamiento'] );
    $vendedores_id = mysqli_real_escape_string( $db,  $_POST['vendedor'] );
    $creado= date('Y/m/d');

    //Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    var_dump($imagen['name']);
    


    



    if(!$titulo){
        $errores[] = "Debes agregar un titulo";
    }
    if(!$precio){
        $errores[] = "El precio es obligatorio";
    }
    if( strlen ($descripcion) < 50  ){
        $errores[] = "La descripcion es obligatoria y tiene que tener por lo menos 50 caracteres.";
    }
    if(!$habitaciones){
        $errores[] = "El numero de habitaciones es obligatorio";
    }
    if(!$wc){
        $errores[] = "El numero de baños es obligatorio ";
    }
    if(!$estacionamiento){
        $errores[] = "El numero de estacionamientos  es obligatorio ";
    }
    if(!$vendedores_id){
        $errores[] = "Debes seleccionar un vendedor";
    }
    if (!$imagen['name'] || $imagen['error'] ) {
        $errores[] = "La imagen  es obligatoria ";
    }

    //Validar por tamaño (100kb max)
    $medida = 1000 * 1000;

    if ($imagen['size'] > $medida) {
        $errores[] = 'La imagen es muy pesada';
    }

    /*     echo "<pre>";
        var_dump($errores);
        echo "</pre>"; 
    */

    //revisar que el arreglo de errores esté vacio.
    if(empty($errores)) { 
        
        /* Subida de archivos */
        //Crear una carpeta 
        $carpetaImagenes = '../../imagenes/';        //salimos dos veces para no crearla en propiedades ni admin, y crear la carpeta en la raiz   

        if(!is_dir($carpetaImagenes)) {   //funcion que revisa si existe la carpeta
            mkdir($carpetaImagenes);    //si no existe la crea
        }

        //Generar Nombre Único
        $nombreImagen = md5( uniqid(rand(), true)).".jpg"; 

        //subir imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen  );


        //insertar en la base de datos
        $query = "INSERT INTO propiedades (titulo,precio, imagen,descripcion,habitaciones,wc,estacionamiento,creado,vendedores_id) 
        VALUES('$titulo','$precio', '$nombreImagen' ,'$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedores_id')";


        //  echo $query;
        $resultado = mysqli_query($db, $query);

        if($resultado){
                //redireccionar al usuario

                header('location: ../propiedades/index.php?resultado=1');
            }
    }
    
}


    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>crear</h1>

        <a href="/bienesraices/admin/propiedades/index.php" class="boton boton-verde">volver</a>

    <!-- Accedera al arreglo de errores y que se muestre en pantalla -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
            <?php echo $error; ?>
            </div>
        <?php endforeach; ?>



        <form class="formulario" method="POST" action="../../admin/propiedades/crear.php" enctype="multipart/form-data"> 
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" 
                id="titulo" 
                name="titulo" 
                placeholder="Titulo de la Propiedad" 
                value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" 
                name="precio" 
                placeholder="precio propiedad" 
                value="<?php echo $precio; ?>">
                

                <label for="imagen">Imagen:</label>
                <input type="file" 
                id="imagen" 
                accept="image/jpeg, image/png"
                name="imagen">

                <label for="descripcion">Descripcíon:</label>
                <textarea  id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion de la propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number"
                name="habitaciones" 
                placeholder="Ej:3" 
                min="1" 
                max="9"  
                value="<?php echo $habitaciones; ?>">
                
                <label for="wc">Baños:</label>
                <input type="number" 
                name="wc" 
                placeholder="Ej:3" 
                min="1" 
                max="9" 
                value="<?php echo $wc; ?>" >

                
                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" 
                name="estacionamiento" 
                placeholder="Ej:3" 
                min="1" 
                max="9" 
                value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">--Seleccione--</option>
                    <!-- la comunidad se puso de acuerdo para que se llame $row a estos reguistros, en este caso son los vendedores   -->
                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ) : ?>   
                        <option 
                            <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?>
                                value="<?php echo $vendedor['id']; ?>"> 
                            <?php echo $vendedor['nombre'] ." ". $vendedor['apellido']; ?>
                        </option>
                    <?php endwhile; ?> 
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>

    </main>

<?php
    incluirTemplate('footer');

?>
