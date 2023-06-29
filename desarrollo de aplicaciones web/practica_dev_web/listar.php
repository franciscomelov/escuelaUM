<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
	
	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div >
		<h1>Productos</h1>
		<div>
		<td><button onClick="popUpNuevo()">Nuevo</button></td>
		</div>
		<br>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>

					<td><button onClick="popUpEditar(<?php echo $producto->id ?>)" >Editar</button></td>
					<td><button onClick="popUpEliminar(<?php echo $producto->id ?>)" >Eliminar</button></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</div>

	<script>
        function popUpEditar(id){
            var url = "./editar.php?id=" + id;
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }

		function popUpEliminar(id){
            var url = "./eliminar.php?id=" + id;
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }

		function popUpNuevo(){
            var url = "./formulario.php";
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }
	</script>
</body>
</html>