<?php
//require '../lib_carrito.php';
//require("banco_test.php");
class carrito {
	//atributos de la clase
   	var $num_productos;
   	var $array_id_prod;
   	var $array_nombre_prod;
   	var $array_precio_prod;
   	Var $suma_total;
	//constructor. Realiza las tareas de inicializar los objetos cuando se instancian
	//inicializa el numero de productos a 0
	function carrito () {
   		$this->num_productos=0;
   		$this->suma_total=0;
	}
	
	//Introduce un producto en el carrito. Recibe los datos del producto
	//Se encarga de introducir los datos en los arrays del objeto carrito
	//luego aumenta en 1 el numero de productos
	function introduce_producto($id_prod,$nombre_prod,$precio_prod){
		$this->array_id_prod[$this->num_productos]=$id_prod;
		$this->array_nombre_prod[$this->num_productos]=$nombre_prod;
		$this->array_precio_prod[$this->num_productos]=$precio_prod;
		$this->num_productos++;
	}

	//Muestra el contenido del carrito de la compra
	//ademas pone los enlaces para eliminar un producto del carrito
	function imprime_carrito(){
		$suma = 0;
		echo '<table border=1 cellpadding="3">
			  <tr>
				<td><b>Nombre producto</b></td>
				<td><b>Precio</b></td>
				<td>&nbsp;</td>
			  </tr>';
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				echo '<tr>';
				echo "<td>" . $this->array_nombre_prod[$i] . "</td>";
				echo "<td>" . $this->array_precio_prod[$i] . "</td>";
				echo "<td><a href='eliminar_producto.php?linea=$i'>Eliminar producto</td>";
				echo '</tr>';
				$suma += $this->array_precio_prod[$i];
			}
		}
		$suma_total=$suma;
		//muestro el total
		echo "<tr><td><b>TOTAL:</b></td><td> <b>$suma</b></td><td>&nbsp;</td></tr>";
		//total más IVA
		echo "<tr><td><b>IVA (16%):</b></td><td> <b>" . $suma * 1.16 . "</b></td><td>&nbsp;</td></tr>";
		echo "</table>";
	}
	
	//elimina un producto del carrito. recibe la linea del carrito que debe eliminar
	//no lo elimina realmente, simplemente pone a cero el id, para saber que esta en estado retirado
	function elimina_producto($linea){
		$this->array_id_prod[$linea]=0;
		$this->num_productos--;
	}

	function get_id_producto($linea){	   	
		if($this->array_id_prod[$linea]!=0)
			return $this->array_id_prod[$linea];
		else
			return null;
	}
	function get_nombre_producto($linea){	   	
		if($this->array_id_prod[$linea]!=0)
			return $this->array_nombre_prod[$linea];
		else
			return null;
	}
} 
//inicio la sesión
session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}
class compras{
	var $banco;
	var $carrito10;
	var $usuario;
	function compras(){
		//$banco=new banco;
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
class banco{
	  function comprobar_saldo_tarjeta($numero_tarjeta,$nombre_titular,$monto_necesario){
	  //MOCK CONSULTA DE LA BASE DE DATOS DEL BANCO
	  if($nombre_titular==111){ //cliente encontrado
	      if($numero_tarjeta==1){//no. tarjeta encontrada
	          if($monto_necesario<=200){ //200 es el monto que tiene el cliente disponible en la tarjeta
	              return true;
	          }
	          
	      }
	      
	  }
	  return false;
	}
	function banco(){
	//	$this->comprobar_saldo_tarjeta(1,111,200); 
	}
}	
?>
<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
<title>Compras - Game World</title>
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
<?php
if(isset($_POST['monto'])){
	$tarjeta =  new banco;
	$monto=$_POST['monto'];
	$result = $tarjeta->comprobar_saldo_tarjeta(1,111,$monto);
	if($result==1)			
		echo "<script>alert('Tiene saldo suficiente para la compra');</script>";
		//echo "<script>alert('Tiene saldo suficiente para la compra');</script>";
	else
		echo "<script>alert('Tiene saldo insuficiente para la compra');</script>";
}
if(isset($_POST['noitems'])){
	$numitem=$_POST['noitems'];
	if (!isset($_SESSION["ocarrito"]))
		$_SESSION["ocarrito"] = new carrito;		
	$compra = new compras;
	if (isset($_SESSION["ocarrito"])){
		$carrito1=$_SESSION["ocarrito"];
	}		
	for($i=0;$i<$numitem;$i++){
		$carrito1->introduce_producto($i,"producto".$i,5*$i);
	}		
	$anterior=$carrito1->num_productos;	
	echo "<div ><h1>'Productos insertados: ".$anterior."</h1>";	
	echo "<p>Comprando productos..</p>";	
	$compra->efectuar_compra();		
	$carrito1=$_SESSION["ocarrito"];	
	if($carrito1->num_productos==0)
		echo "<h1>Productos despues de compra: 0</h1>";	
	else
		echo "<h1>Productos despues de compra: ".$carrito1->num_productos."</h1>";	
}
?>
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
						<li><a href="../index.html"><img src="images/icon1-act.gif" alt="" /></a></li>
						<!--<li><a href="contact-us.php"><img src="images/icon2.gif" alt="" /></a></li> -->
						
					</ul>
				</div>
				<div class="row-2">
					<ul>
						<li><a href="../index.html" class="active">Inicio</a></li>
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
								<p>Version alpha</p>
								<div class="img-box1"><img src="images/1page-img1.jpg" alt="" />
									<h4>Prueba de fondos suficientes</h4>
									<form action="compra.php" method="post">
										<label>Ingrese un monto</label></br><input type="text" id="monto" name="monto"/>&nbsp<input type="submit" id="b1" value="Comprobar monto"/>
									</form>
								</div>
								<div class="img-box1"><img src="images/1page-img2.jpg" alt="" />
									<h4>Prueba Comprar todos los productos del carro</h4>
									<form action="compra.php" method="post">
										<label>Ingrese un Numero de Productos inicial</label></br><input type="text" id="noitems" name="noitems"/>&nbsp										
										<input type="submit" id="b2" value="Ingresar Productos"/>		
									</form>
								</div>
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