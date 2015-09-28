<?php
class banco{
	  function comprobar_saldo_tarjeta($numero_tarjeta,$nombre_titular,$monto_necesario){
	  //MOCK CONSULTA DE LA BASE DE DATOS DEL BANCO
	  if($nombre_titular==111){ //cliente encontrado
	      if($numero_tarjeta==1){//no. tarjeta encontrada
	          if($monto_necesario<=200){ //200 es el monto que tiene el cliente disponible en la tarjeta
	              return true;
	          }
	          
	      }
	      
	  }
	  return false;
	}
	function banco(){
	//	$this->comprobar_saldo_tarjeta(1,111,200); 
	}
}

class banco_test extends PHPUnit_Framework_TestCase
{

		


	function test_comprobar_saldo_tarjeta(){					
        $tarjeta =  new banco;

	    $result = $tarjeta->comprobar_saldo_tarjeta(1,111,200);//solicita 200 monto necesario
		$this->assertEquals(true, $result); //tiene lo sufieciente
		
		$result= $tarjeta->comprobar_saldo_tarjeta(1,111,500);//solicita 500 monto necesario
		$this->assertEquals(false, $result );//no tiene lo suficiente
	}
}
?> 
