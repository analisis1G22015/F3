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
