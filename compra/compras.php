<?php
class compras{
	var $banco;
	var $carrito10;
	var $usuario;
	function compras(){
		//$banco=new banco;
		if (isset($_SESSION["ocarrito"])){
			$carrito10=$_SESSION["ocarrito"];
		}
		if (isset($_SESSION["usuario"])){
			//$carrito1=$_SESSION["usuario"];
		}
	}
	function efectuar_compra(){
		$banderaInventario=true;
		// if($banco->comprobar_saldo_tarjet($usuario->numero_tarjeta,$usuario->fecha_vencimiento,$usuario->codigo_seguridad,$usuario->nombre,$carrito->suma_total))
		// echo "<p>Si puede realizarse la compra</p>";
		// return true;
		$limite=$carrito10->num_productos;
		for($i=0;$i<$limite;$i++){//PRIMER CICLO COMPRUEBA
			echo $i;
			$id = $carrito10->get_id_producto($i);
			$this->comprobar_inventario($id);
			if (!$existe){
				echo "No existe en inventario el producto: ", $carrito10->get_nombre_producto($i);
				$banderaInventario=false;
			} 
		}
		if(banderaInventario){
			for($i=0;$i<$limite;$i++){//SEGUNDO CICLO QUITA DE INVENTARIO
				echo $i;
				$id = $carrito10->get_id_producto($i);
				$this->quitar_inventario($id);
				$carrito10->elimina_producto($i);
				echo "hola.";
				$carrito10->num_productos--;
			}
		}
		$_SESSION["ocarrito"]=$carrito10;
	}
	function comprobar_inventario($id){
		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="ARTICULO";
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Consulta el inventario
		$consulta = "SELECT cantidad FROM $tabla WHERE articulo=".$id.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$Existencia=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['cantidad'];
			$Existencia =$row['cantidad'];
			break;

		}
		if(Existencia>=1){
			return true;
		}
		return false;
	}

	function quitar_inventario($id){
		$host="mysql.hostinger.es";
		$user="u586837674_julio";
		$pass="juliusdavid123";
		$db="u586837674_ayd1";
		$tabla="ARTICULO";
		$con = @mysql_connect($host,$user,$pass);
		mysql_select_db($db);
	//Resta uno a la cantidad 
		$consulta = "SELECT cantidad FROM $tabla WHERE articulo=".$id.""; 
		$resultado = mysql_query($consulta,$con) or die ( 'error' .mysql_errno());
		$Existencia=0;
		while ($row = mysql_fetch_assoc($resultado)) {
			echo $row['cantidad'];
			$Existencia =$row['cantidad'];
			break;

		}
		$Existencia = $Existencia-1;
		$consulta = "UPDATE $tabla SET cantidad='$Existencia' WHERE articulo=" .$id.""; //se resta uno de inventario	
		$resultado = mysql_query($consulta,$con) or die ( 'error al listar, $pegar' .mysql_errno());
		echo "exito";

	}

}
