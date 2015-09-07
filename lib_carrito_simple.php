<?
class carrito {
	//atributos de la clase
   	var $num_productos;
   	var $array_id_prod;
   	var $array_nombre_prod;
   	var $array_precio_prod;

	//constructor. Realiza las tareas de inicializar los objetos cuando se instancian
	//inicializa el numero de productos a 0
	function carrito () {
   		$this->num_productos=0;
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
		echo '<table border=1 cellpadding="3">
			  <tr>
			  	<td><b>ID</b></td>
				<td><b>Nombre producto</b></td>
				<td><b>Precio</b></td>
			  </tr>';
		for ($i=0;$i<$this->num_productos;$i++){
			echo '<tr>';
			echo "<td>" . $this->array_id_prod[$i] . "</td>";
			echo "<td>" . $this->array_nombre_prod[$i] . "</td>";
			echo "<td>" . $this->array_precio_prod[$i] . "</td>";
			echo '</tr>';
		}
		echo "</table>";
	}
} 
//inicio la sesión
session_start();
//si no esta creado el objeto carrito en la sesion, lo creo
if (!isset($_SESSION["ocarrito"])){
	$_SESSION["ocarrito"] = new carrito();
}
?>
