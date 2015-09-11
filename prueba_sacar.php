<?php
include("lib_carrito.php");

class PersonTEst extends PHPUnit_framework_TestCase{

	public $test;
	public function setUp(){
		$this->test = $_SESSION["ocarrito"]->num_productos;
		$_SESSION["ocarrito"]->elimina_producto("0");
	}

	public function testName(){
		$jason = $_SESSION["ocarrito"]->num_productos +1;
		$this->assertTrue($jason == $this->test);
	}
}
?>