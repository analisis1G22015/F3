<?php
include("lib_carrito.php");

class PersonTEst extends PHPUnit_framework_TestCase{

	public $test;
        public $test2;
	public function setUp(){
                session_name("primero");
		$_SESSION["ocarrito"]=new carrito();
		$_SESSION["ocarrito"]->introduce_producto(12, "silla+modelo+jupiter", 80);		
		$this->test = $_SESSION["ocarrito"]->num_productos;

                session_name("segundo");
		$_SESSION["ocarrito"]=new carrito();
		$_SESSION["ocarrito"]->introduce_producto(12, "silla+modelo+jupiter", 80);		
		$this->test2 = $_SESSION["ocarrito"]->num_productos;

	}

	public function testName(){
                session_name("primero");
                //$_SESSION["usuario_carro"]->introduce_producto("1", "dildo", "5");
		$jason = $_SESSION["ocarrito"]->num_productos;
		$this->assertTrue($jason == $this->test);
                session_name("segundo");
                //$_SESSION["usuario_carro"]->introduce_producto("1", "dildo", "5");
		$jason2 = $_SESSION["ocarrito"]->num_productos;
		$this->assertTrue($jason2 == $this->test2);
		
	}
}


?>
