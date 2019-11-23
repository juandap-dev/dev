<?php
if(isset($_POST['submitSave'])) {
	$productos = simplexml_load_file('producto.xml');
	$producto = $productos->addChild('producto');
	$producto->addAttribute('id', $_POST['id']);
	$producto->addChild('nombre', $_POST['nombre']);
	$producto->addChild('precio', $_POST['precio']);
	file_put_contents('producto.xml', $productos->asXML());
	header('location:index.php');
}
?>

<style type="text/css">
  h1 { text-align: center}
 </style>

<body background="img/fondo_blanco.jpg">
	<h1 >Por favor registre el nuevo productos en los siguientes Item</h1>

	<!-- con el metodo post seleccionamos los datos que no son visibles para el cliente -->
<form method="post">
	<table align="center" cellpadding="2" cellspacing="2">
		<tr>
			<td>Id</td>
			<td><input type="text" name="id"></td>
		</tr>
		<tr>
			<td>Nombre del producto</td>
			<td><input type="text" name="nombre"></td>
		</tr>
		<tr>
			<td>Cantidad</td>
			<td><input type="text" name="precio"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type="submit" value="Guardar" name="submitSave"></td>
		</tr>
	</table>
</form>
</body>