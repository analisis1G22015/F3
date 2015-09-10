<?php
include("compra.php");
class compraTest extends PHPUnit_Framework_TestCase
{
	var $compra;
	function test_Compra_realizable(){					
		$compra = new compras;
		$this->assertEquals(true,$compra->efectuar_compra("","","","","",""));
	}
}