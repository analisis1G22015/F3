<?php
class banco{
	function comprobarydebitar_saldo_tarjeta($numero_tarjeta,$nombre_titular,$monto_necesario){
	//conexion a la base de datos

		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="TARJETA";
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Consulta el monto del cliente
		$consulta = "SELECT monto_actual FROM $tabla WHERE cliente=" .$nombre_titular.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
		$Saldo=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['monto_actual'];
			$Saldo =$row['monto_actual'];
			break;

		}
		if($Saldo>=$monto_necesario){ //El saldo es suficiente entonces se debita
			$nuevoSaldo= $Saldo-$monto_necesario;
echo $nuevoSaldo;	
			$consulta = "UPDATE $tabla SET monto_actual='$nuevoSaldo' WHERE cliente=" .$nombre_titular.""; //se debita	
			$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
			echo "exito" ;	
			return true;
		}
		return false;
	}

//Llamada a la función
	function banco(){
		$this->comprobarydebitar_saldo_tarjeta(1,1,200);
	
	}
}
$obj=new banco;