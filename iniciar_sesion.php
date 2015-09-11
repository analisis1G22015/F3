<?php
include("lib_carrito.php");
session_start();
$var=$_POST['nombre'];
session_name($var);
$_SESSION["usuario_carro"]=new carrito();//carrito para este usuario
header("Location:index.php");
?>
