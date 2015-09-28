<?php
class carrito {
	//atributos de la clase
   	var $num_productos;
   	var $array_id_prod;
   	var $array_nombre_prod;
   	var $array_precio_prod;
   	Var $suma_total;
	//constructor. Realiza las tareas de inicializar los objetos cuando se instancian
	//inicializa el numero de productos a 0
	function carrito () {
   		$this->num_productos=0;
   		$this->suma_total=0;
	}
	
	//Introduce un producto en el carrito. Recibe los datos del producto
	//Se encarga de introducir los datos en los arrays del objeto carrito
	//luego aumenta en 1 el numero de productos
	function introduce_producto($id_prod,$nombre_prod,$precio_prod){
		$this->array_id_prod[$this->num_productos]=$id_prod;
		$this->array_nombre_prod[$this->num_productos]=$nombre_prod;
		$this->array_precio_prod[$this->num_productos]=$precio_prod;
		$this->num_productos++;
	}

	//Muestra el contenido del carrito de la compra
	//ademas pone los enlaces para eliminar un producto del carrito
	function imprime_carrito(){
		$suma = 0;
		echo '<table border=1 cellpadding="3">
			  <tr>
				<td><b>Nombre producto</b></td>
				<td><b>Precio</b></td>
				<td>&nbsp;</td>
			  </tr>';
		for ($i=0;$i<$this->num_productos;$i++){
			if($this->array_id_prod[$i]!=0){
				echo '<tr>';
				echo "<td>" . $this->array_nombre_prod[$i] . "</td>";
				echo "<td>" . $this->array_precio_prod[$i] . "</td>";
				echo "<td><a href='eliminar_producto.php?linea=$i'>Eliminar producto</td>";
				echo '</tr>';
				$suma += $this->array_precio_prod[$i];
			}
		}
		$suma_total=$suma;
		//muestro el total
		echo "<tr><td><b>TOTAL:</b></td><td> <b>$suma</b></td><td>&nbsp;</td></tr>";
		//total más IVA
		echo "<tr><td><b>IVA (16%):</b></td><td> <b>" . $suma * 1.16 . "</b></td><td>&nbsp;</td></tr>";
		echo "</table>";
	}
	
	//elimina un producto del carrito. recibe la linea del carrito que debe eliminar
	//no lo elimina realmente, simplemente pone a cero el id, para saber que esta en estado retirado
	function elimina_producto($linea){
		$this->array_id_prod[$linea]=0;
		$this->num_productos--;
	}

	function get_id_producto($linea){	   	
		if($this->array_id_prod[$linea]!=0)
			return $this->array_id_prod[$linea];
		else
			return null;
	}
	function get_nombre_producto($linea){	   	
		if($this->array_id_prod[$linea]!=0)
			return $this->array_nombre_prod[$linea];
		else
			return null;
	}
} 
//inicio la sesión
session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}
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
	//	if($banco->comprobar_saldo_tarjet($usuario->numero_tarjeta,$usuario->fecha_vencimiento,$usuario->codigo_seguridad,$usuario->nombre,$carrito->suma_total))
	//		echo "<p>Si puede realizarse la compra</p>";
	//	return true;
	    $limite=$carrito10->num_productos;
		for($i=0;$i<$limite;$i++){
		    echo $i;
			$carrito10->get_id_producto($i);
			//comprobar existencia
			$carrito10->elimina_producto($i);
			echo "hola.";
			$carrito10->num_productos--;
		}	
		$_SESSION["ocarrito"]=$carrito10;
		
	}


}
class compraTest extends PHPUnit_Framework_TestCase
{

		
	var $compra,$carrito1=NULL;

	function test_productos_en_carrito(){					
        
		//session_start();
		if (!isset($_SESSION["ocarrito"]))
			$_SESSION["ocarrito"] = new carrito;		
		$compra = new compras;
		if (isset($_SESSION["ocarrito"])){
			$carrito1=$_SESSION["ocarrito"];
		}		
		for($i=0;$i<10;$i++){
			$carrito1->introduce_producto($i,"producto".$i,5*$i);
		}		
		$anterior=$carrito1->num_productos;
		echo "Anterior: ".$anterior."\n";
		$compra->efectuar_compra();		
		$carrito1=$_SESSION["ocarrito"];
		echo "Despues: ".$carrito1->num_productos;
		$this->assertNotEquals($anterior,$carrito1->num_productos);
	}
}
?> 
