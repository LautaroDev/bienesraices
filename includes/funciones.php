<?php 

function incluirTemplate( string $nombre, bool $inicio = false ){
 //   include  "includes/template/$nombre.php";
    include  TEMPLATE_URL . "/$nombre.php";   
}

function estaAutenticado(): bool{
    session_start();

    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}