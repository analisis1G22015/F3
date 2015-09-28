<?php
require_once 'index.php';
class indexTEst extends PHPUnit_framework_TestCase{

	public $articulos;
	public function setUp(){
		
		$this->articulos = 9;
			
	}
	
	public function CantidadTest($numero_art)
	{
		$numero_articulos = $this->articulos;
		
		$this->assertTrue($numero_art =< numero_articulos);
		
	}
	
}
?>