<?
include ("lib_carrito.php");
//$_SESSION["ocarrito"]->introduce_producto($_GET["id"], $_GET["nombre"], $_GET["precio"]);
$_SESSION["usuario_carro"]->introduce_producto($_GET["id"], $_GET["nombre"], $_GET["precio"]);
?>

<html>
<head>
	<title>Introduce Producto</title>
</head>

<body>

Producto introducido.
<br>
<br>
<a href="index.php">- Volver</a>
<br>
<br>
<a href="ver_tabla_carrito.php">- Ver carrito</a>

</body>
</html>
