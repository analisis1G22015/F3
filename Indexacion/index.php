<!DOCTYPE html>
<html>

<head>
  <title>Analisis y Diseño 1</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>

<?php 

//conexion a la base de datos 
$host="mysql.hostinger.es"; 
$user="u586837674_julio"; 
$pass="juliusdavid123"; 
$db="u586837674_ayd1"; 
$tabla="ARTICULO"; 

//conectamos con la base de datos 

$con = @mysql_connect($host,$user,$pass); 
mysql_select_db($db); 

//establecemos condiciones de paginacion 
$registros = $_POST['nombre']; 

@$pagina = $_GET ['pagina']; 

if (!isset($pagina)) 
{ 
$pagina = 1; 
$inicio = 0; 
} 
else 
{ 
$inicio = ($pagina-1) * $registros; 
} 

//realizamos la busqueda en la base de datos 
$pegar = "SELECT * FROM $tabla ORDER BY ARTICULO ASC LIMIT ".$inicio." , ".$registros." "; 
$cad = mysql_query($pegar,$con) or die ( 'error al listar, $pegar' .mysql_errno()); 

//calculamos las paginas a mostrar 

$contar = "SELECT * FROM $tabla"; 
$contarok = mysql_query($contar,$con); 
$total_registros = mysql_num_rows($contarok); 
//$total_paginas = ($total_registros / $registros); 
$total_paginas = ceil($total_registros / $registros); 
?>

  <div id="main">
    <div id="links"></div>
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- <h1>tree<span class="alternate_colour">_tops</span></h1>-->
        </div>
      </div>
      <div id="menubar">
      </div>
    </div>
    <div id="site_content" >  
      <div id="content">
        <!-- insert the page content here -->
		<?php
		
		echo '<table align="center">'; 
		$contador = 0;
		echo '<tr>';
		while ($array = mysql_fetch_array($cad)){ 

			$contador = $contador + 1;
			
			if($contador >= 1 and $contador <= 3){
							
				echo '<td <width="400" align="center"><img src="' .$array['imagen']. '" width=\'150\' height=\'150\'/></td>';
				if($contador == 3){echo '</tr>';}
				
			}
			elseif($contador >= 4 and $contador <= 6){
			
				if($contador == 4){echo '</tr>';}
				echo '<td <width="400" align="center"><img src="' .$array['imagen']. '" width=\'150\' height=\'150\'/></td>';
				if($contador == 6){echo '</tr>';}
			
			}
			elseif($contador >= 7 and $contador <= 9){
				
				if($contador == 7){echo '</tr>';}
				//echo '<td <width="200" align="center">'.$array['imagen']. '</td>';
				echo '<td <width="400" align="center"><img src="' .$array['imagen']. '" width=\'150\' height=\'150\'/></td>';
			}
		} 
		echo '</tr>';
		echo "</table>";
		echo "<center><p>"; 
		$contador = 0;
		if($total_registros>$registros){ 
		if(($pagina - 1) > 0) { 
		echo "<span class='pactiva'><a href='?pagina=".($pagina-1)."'>&laquo; Anterior</a></span> "; 
		} 
		// Numero de paginas a mostrar 
		$num_paginas=10; 
		//limitando las paginas mostradas 
		$pagina_intervalo=ceil($num_paginas/2)-1; 

		// Calculamos desde que numero de pagina se mostrara 
		$pagina_desde=$pagina-$pagina_intervalo; 
		$pagina_hasta=$pagina+$pagina_intervalo; 

		// Verificar que pagina_desde sea negativo 
		if($pagina_desde<1){ // le sumamos la cantidad sobrante para mantener el numero de enlaces mostrados $pagina_hasta-=($pagina_desde-1); $pagina_desde=1; } // Verificar que pagina_hasta no sea mayor que paginas_totales if($pagina_hasta>$total_paginas){ 
		$pagina_desde-=($pagina_hasta-$total_paginas); 
		$pagina_hasta=$total_paginas; 
		if($pagina_desde<1){ 
		$pagina_desde=1; 
		} 
		} 

		for ($i=$pagina_desde; $i<=$pagina_hasta; $i++){ 
		if ($pagina == $i){ 
		echo "<span class='pnumero'>".$pagina."</span> "; 
		}else{ 
		echo "<span class='pactiva'><a href='?pagina=$i'>$i</a></span> "; 
		} 
		} 

		if(($pagina + 1)<=$total_paginas) { 
		echo " <span class='pactiva'><a href='?pagina=".($pagina+1)."'>Siguiente &raquo;</a></span>"; 
		} 
		} 
		echo "</p></center>"; 
		
		?>
		
		
		
        
      </div>
    <div id="site_content_bottom"></div>
    </div>
    <div id="footer">Copyright &copy; All Rights Reserved. </div>
  </div>
</html>
