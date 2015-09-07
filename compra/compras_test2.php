<?php
class compraTest extends PHPUnit_Framework_TestCase
{
	var $num_productos=5;
	var $array_id_prod;
	function compraTest(){
		for($i=0;$i<5;$i++){
			$this->array_id_prod[$this->$i]=$i+4;
		}
	}

	public function test_Existe_carrito(){					
		return true;		
	}
	public function test_producto_bd($id_producto){
		return true;
	}
	public function test_producto_en_existencia(){			
		if(test_Existe_carrito){
			for ($i=0;$i<$this->num_productos;$i++){
				if($this->array_id_prod[$i]!=0){
					$this->assertEquals(true,(test_producto_bd($this->array_id_prod[$i])));
				}
			}
		}		
	}
}