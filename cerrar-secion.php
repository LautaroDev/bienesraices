<?php 
session_start();
var_dump($_SESSION);

$_SESSION = [];
header('Location: /bienesraices/index.php');
?>