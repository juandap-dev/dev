<?php

//lo que hace es comprobar que lo que te trae el $_GET . Muestra si esta definida la variable action y si lo esta muestra la informacion que coloco el usuario
if(isset($_GET['action'])) {
	$productos = simplexml_load_file('producto.xml');
	$id = $_GET['id'];
	$index = 0;
	$i = 0;
	foreach($productos->producto as $producto){
		if($producto['id']==$id){
			$index = $i;
			break;
		}
		$i++;
	}
	unset($productos->producto[$index]);//elimina las variables que les escribamos dento del parentesis mediante unset()
	file_put_contents('producto.xml', $productos->asXML());
}
$productos = simplexml_load_file('producto.xml');

echo 'Productos registrados: '.count($productos);//Cuenta todos los elementos del array mediante el count

echo '<br>Informacion de la lista de productos';
?>


<body background="img/fondo_blanco.jpg">
<a href="agregar.php">Agregar nuevo producto</a>
<br>
 <TITLE>Inventario</TITLE>
 <style type="text/css">
  h1 { text-align: center}
 </style>
 <h1>Lista de productos</h1>

<LINK href="estilos/estilos.css" rel="stylesheet" type="text/css">
<table align="center">
<thead>
<tr>
	<th>Producto</th>
	<th>Imagen</th>
</tr>
</thead>
<tr>
	<td>Frescasa</td>
	<td><img src="img/frescasa.jpg" width="40" height="40"/></td>
</tr>
<tr>
	<td>Pvc</td>
	<td><img src="img/pvc.jpg"width="40" height="40"/></td>
</tr>
<tr>
	<td>Tornillo 6 x 1</td>
	<td><img src="img/tornillo6x1.jpg" width="40" height="40"/></td>
</tr>
</table>
<br/>

<table cellpadding="2" cellspacing="2" border="1" align="center">
	<tr>
		<th>identificador Producto</th>
		<th>Nombre del producto</th>
		<th>Cantidad</th>
		<th>Opciones</th>
	</tr>
	<?php foreach($productos->producto as $producto) { ?>
	<tr>
		<td><?php echo $producto['id']; ?></td>
		<td><?php echo $producto->nombre; ?></td>
		<td><?php echo $producto->precio; ?></td>
		<td><a href="update.php?id=<?php echo $producto['id']; ?>">Modificar</a> |
			<a href="index.php?action=delete&id=<?php echo $producto['id']; ?>" onclick="return confirm('Estas seguro?')">EliminaR Pr.</a></td>
	</tr>
	<?php } ?>
</table>
</body>