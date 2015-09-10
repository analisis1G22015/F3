<?php
include("../lib_carrito.php");
include("banco_test.php");
class compras{
	var $banco;
	var $carrito;
	var $usuario;
	function compras(){
		$banco=new banco();
		if (isset($_SESSION["ocarrito"])){
			$carrito=$_SESSION["ocarrito"];
		}		
		if (isset($_SESSION["usuario"])){
			$carrito=$_SESSION["usuario"];
		}		
	}	
	function efectuar_compra(){
		if($banco->comprobar_saldo_tarjet($usuario->numero_tarjeta,$usuario->fecha_vencimiento,$usuario->codigo_seguridad,$usuario->nombre,$carrito->suma_total))
			echo "<p>Si puede realizarse la compra</p>";
		return true;
	}
}
