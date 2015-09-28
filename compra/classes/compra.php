<?php
include("../lib_carrito.php");
include("banco_test.php");
class compras{
	var $banco;
	var $carrito10;
	var $usuario;
	function compras(){
		$banco=new banco();
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
		for($i=0;$i<$carrito10->num_productos;$i++){
			$carrito10->get_id_producto($i);
			//comprobar existencia
			$carrito10->elimina_producto($i);
		}		
	}


}
?>