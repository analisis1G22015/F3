<?php
include("lib_carrito.php");
class test extends PHPUnit_framework_TestCase{

	public $test, $test2;
	public function setUp(){
		$this->test = new carrito("fernando");
                $this->test2 = new carrito("samayoa");
	}

	public function testName(){
		$ses = $this->test->get_ses();
		$this->assertTrue($ses == "fernando");
                $ses = $this->test2->get_ses();
		$this->assertTrue($ses == "samayoa");
	}
}
?>
