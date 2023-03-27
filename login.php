<?php
require 'includes/config/database.php';
$db = conectarDB();

//Autenticar Usuario
$errores = [];
$hola = "hay un error ";
if($_SERVER['REQUEST_METHOD'] === 'POST'){
/*     echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; */

    $email = mysqli_real_escape_string( $db ,filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db , $_POST['password']); 

    if (!$email) {
        $errores[] = "El email es obligatorio o  no es Valido";
    }

    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if (empty($errores)) {
    //revisar si el usuario existe.
    $query = "SELECT * FROM usuarios WHERE  email = '{$email}'" ;
    $resultado = mysqli_query($db, $query);
    }

    if ($resultado->num_rows ) {
        //revisar si el password es correcto
        $usuario = mysqli_fetch_assoc($resultado);

        //verificar si el password es correcto o no 
        $auth = password_verify($password, $usuario['password']);
        if ($auth) {
            //el usuario esta autenticado
            session_start();  //SIEMPRE INICIAR LA SESSION PARA TENER ACCESO A ESTA

            //llenar arreglo de la sesión
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['login'] = true;

            header('Location: admin/propiedades/index.php');
            
        }else {
            $errores[] = "El password es incorrecto";
        }
    } else {
        $errores[] = "El usuario no existe";
    }
}

//incluye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach ($errores as $error) :  ?>
            <div class="alerta error">
                <?php  echo $error; ?>
            </div>
        <?php endforeach;  ?>

        

        <form method="POST" class="formulario">
            <fieldset>  <!-- (campos relacionados) informacion personal -->
                <legend>Email y password</legend>

                <label for="email">Email</label>
                <input name="email" type="email" placeholder="Tu email" id="email" required>

                <label for="password">password</label>
                <input name="password" type="password" placeholder="Tu password" id="password" required>

            </fieldset>
            <input type="submit"
            value="Iniciar Sesión"
            class="boton boton-verde">
        </form>
    </main>

<?php
    incluirTemplate('footer');
?>
