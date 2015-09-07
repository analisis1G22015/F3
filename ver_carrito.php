<?
include("lib_carrito.php");
?>

<html>
<head>
	<title>Introduce Producto</title>
</head>

<body>

<?
$_SESSION["ocarrito"]->imprime_carrito();
?>
<br>
<br>
<a href="index.php">Volver</a>


</body>
</html>
