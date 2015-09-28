<?php

class banco{
		function comprobar_saldo_tarjeta($numero_tarjeta,$nombre_titular,$monto_necesario){
		//conexion a la base de datos 
		$host="mysql.hostinger.es"; 
		$user="u586837674_julio"; 
		$pass="juliusdavid123"; 
		$db="u586837674_ayd1"; 
		$tabla="TARJETA";
		$con = @mysql_connect($host,$user,$pass); 
		
		mysql_select_db($db); 
		
		$nombre_titular = 111;
				$consulta = "SELECT monto_actual FROM $tabla WHERE cliente" .$nombre_titular.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno()); 
		
		$Monto=0;
		while ($row = mysql_fetch_assoc($resultado)) {
		    echo $row['monto_actual'];
		    $Monto = $row['monto_actual'];
		}
		if($Monto>=monto_necesario){
		return true;
		}

		return false;
	}
	function banco(){
		$this->comprobar_saldo_tarjeta(1,111,200); 
	}
}

$obj=new banco;
