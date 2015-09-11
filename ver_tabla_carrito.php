<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrito | Analisis y diseño 1</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>


</head><!--/head-->

		<?php
			include "lib_carrito.php";
		?>



<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">

						</div>
					</div>
					<div class="col-sm-6">

					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/barco.jpg" title="CC" width='150' height='150' /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="ver_tabla_carrito.php">Carrito</a></li>
								<li><a href="index.php">Inicio</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Articulo</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="quantity"></td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?
					$suma = 0;
					for ($i=0;$i<$_SESSION["usuario_carro"]->num_productos;$i++){
						if($_SESSION["usuario_carro"]->array_id_prod[$i]!=0){
							$id=$_SESSION["usuario_carro"]->array_id_prod[$i];
							$contenido=$contenido.$id.",".$_SESSION["usuario_carro"]->array_nombre_prod[$i].".";
							$suma += $_SESSION["usuario_carro"]->array_precio_prod[$i];
					?>
						<tr>
							<td class="cart_product">
								<a href=""><img src=<?php echo $img; ?> alt="" ></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $_SESSION["usuario_carro"]->array_nombre_prod[$i]; ?></h4>
								<p></p>
							</td>
							<td class="cart_price">
								<p><? echo "Q.".$_SESSION["usuario_carro"]->array_precio_prod[$i]; ?></p>
							</td>
							<td class="cart_quantity">
							</td>
							<td class="cart_total">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" <? echo "href='eliminar_producto.php?linea=".$i."'"; ?> ><IMG SRC='imgtot/eliminar.jpg' WIDTH=32 HEIGHT=32></a>
							</td>
						</tr>
					<?
						}
					}
					?>

						<tr>
							<td class="cart_product">
							</td>
							<td class="cart_description">
								<p>Total</p>
							</td>
							<td class="cart_price">
								<p></p>
							</td>
							<td class="cart_quantity"></td>
							<td class="cart_total">
								<p><? echo "Q.".$suma; ?></p>
							</td>
							<td class="cart_delete">
								<form method="POST" action="contact.php?id=1">
									<input type="hidden" name="articulop" value=<?php echo $contenido; ?> />
									<input type="submit" value="Enviar">
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->


	<footer id="footer"><!--Footer-->

		<!-- footer -->
		<div class="footer">
			<div class="container">
				<div class="footer-grids">
					<div class="col-md-3 footer-grid">
						
					</div>
					<div class="col-md-3 footer-grid">
						
					</div>
					<div class="col-md-3 footer-grid testmonial">
					</div>
					<div class="col-md-3 footer-grid about-grid">

					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- social-icons -->
				<div class="social-icons text-center">

				</div>
				<!-- social-icons -->
						<div class="social-icons text-center">
				<p>Copyright Analisis y diseño 1</p>
				<p>Developed by Grupo</p> 
				<p>Design by holis</p>
		</div>
				<!-- footer-bottom -->
			</div>
		</div>
		<!-- footer -->
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
