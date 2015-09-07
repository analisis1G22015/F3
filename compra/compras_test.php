<?php
class compraTest extends PHPUnit_Framework_TestCase
{
	public function test_Existe_carrito(){					
			$this->assertEquals(true, isset($_SESSION["ocarrito"]));		
	}
}