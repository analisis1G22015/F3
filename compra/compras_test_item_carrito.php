<?php
include("compra.php");
class compraTest extends PHPUnit_Framework_TestCase
{
	var $compra;
	function test_productos_en_carrito($anterior,$actual){					
		$_SESSION["ocarrito"] = new carrito();
		$compra = new compras;
		if (isset($_SESSION["ocarrito"])){
			$carrito=$_SESSION["ocarrito"];
		}		
		for($i=0;$i<10;$i++){
			$carrito->introduce_producto($i,"producto".$i,5*$i);
		}
		$anterior=$carrito->num_productos;
		$compra->efectuar_compra();
		$this->assertEquals($anterior,$carrito->num_productos);
	}
}