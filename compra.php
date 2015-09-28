<?php
//require '../lib_carrito.php';
//require("banco_test.php");
class compras{
	var $banco;
	var $carrito10;
	var $usuario;
	function compras(){
		$banco=new banco;
		if (isset($_SESSION["ocarrito"])){
			$carrito10=$_SESSION["ocarrito"];
		}		
		if (isset($_SESSION["usuario"])){
			//$carrito1=$_SESSION["usuario"];
		}		
	}	
	function efectuar_compra(){
	//	if($banco->comprobar_saldo_tarjet($usuario->numero_tarjeta,$usuario->fecha_vencimiento,$usuario->codigo_seguridad,$usuario->nombre,$carrito->suma_total))
	//		echo "<p>Si puede realizarse la compra</p>";
	//	return true;
	    $limite=$carrito10->num_productos;
		for($i=0;$i<$limite;$i++){
		    echo $i;
			$carrito10->get_id_producto($i);
			//comprobar existencia
			$carrito10->elimina_producto($i);
			echo "hola.";
			$carrito10->num_productos--;
		}	
		$_SESSION["ocarrito"]=$carrito10;
	}


}
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>Home - Game World</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="Place your description here" />
<meta name="keywords" content="put, your, keyword, here" />
<meta name="author" content="Templates.com - website templates provider" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/cufon-replace.js" type="text/javascript"></script>
<script src="js/Gill_Sans_400.font.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<!--[if lt IE 7]>
	<script type="text/javascript" src="js/ie_png.js"></script>
	<script type="text/javascript">
		 ie_png.fix('.png, .link1 span, .link1');
	</script>
	<link href="ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body id="page1">
<div class="tail-top">
	<div class="tail-bottom">
		<div id="main">
<!-- HEADER -->
			<div id="header">
				<div class="row-1">
					<div class="fleft"><a href="index.html"> Game <span>World</span></a></div>
					<ul>
						<li><a href="compra.php"><img src="images/icon1-act.gif" alt="" /></a></li>
						<!--<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li> -->
						
					</ul>
				</div>
				<div class="row-2">
					<ul>
						<li><a href="index.php" class="active">Inicio</a></li>
						<!--<li><a href="articles.php">Articulos</a></li>-->
						<!--<li><a href="contact-us.php">Contactanos</a></li> -->
					</ul>
				</div>
			</div>
<!-- CONTENT -->
			<div id="content"><div class="ic">More Website Templates at TemplateMonster.com!</div>
				<div id="slogan">
					<div class="image png"></div>
					<div class="inside">
						<h2>Game World<span>Fun forever!!! </span></h2>
						<p>Lo que quieras en nuestra web!!! Video juegos, musica y peliculas!!</p>
					</div>
				</div>
				<div class="box">
					<div class="border-right">
						<div class="border-left">
							<div class="inner">
								<h3>Bienvenido a <b>Game </b> <span>World</span></h3>
								<p>Game World es un sitio de venta de video juegos, musica y peliculas.</p>
								<div class="img-box1"><img src="images/1page-img1.jpg" alt="" />Si buscas algo para divertirte este es el lugar indicado</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<!-- FOOTER -->
			<div id="footer">
				<div class="left">
					<div class="right">
						<div class="inside">Copyright &copy; All Rights Reserved.<br />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>