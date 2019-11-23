<?php
$productos = simplexml_load_file('producto.xml');



//Esta instrucción es saber si  envie un formulario a la pagina de producto,  variable $_POST['submit'] debe tener el nombre del boton

if(isset($_POST['submitSave'])) {

	foreach($productos->producto as $producto){
		if($producto['id']==$_POST['id']){
			$producto->nombre = $_POST['nombre'];
			$producto->precio = $_POST['precio'];
			break;
		}
	}
	file_put_contents('producto.xml', $productos->asXML());
	header('location:index.php');
}
//Arreglo para recorrer las distintas etiquetas
foreach($productos->producto as $producto){
	if($producto['id']==$_GET['id']){
		$id = $producto['id'];
		$nombre = $producto->nombre;
		$precio = $producto->precio;
		break;
	}
}

?>

<body background="img/fondo_blanco.jpg">
	<h1>Modifica los item que ncesitas y dale en guardar</h1>

	

<form method="post">
	<table align="center" cellpadding="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id" value="<?php echo $id; ?>" readonly="readonly"></td>
		</tr>
		<tr>
			<td>Nombre del producto</td>
			<td><input type="text" name="nombre" value="<?php echo $nombre; ?>"></td>
		</tr>
		<tr>
			<td>cantidad</td>
			<td><input type="text" name="precio" value="<?php echo $precio; ?>"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Guardar" name="submitSave"></td>
		</tr>
	</table>
</form>
</body>