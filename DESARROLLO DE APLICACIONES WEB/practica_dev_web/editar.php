<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>

	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>

	<div >
		<h1>Editar <?php echo $producto->descripcion; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" name="codigo" required type="text" id="codigo" placeholder="código.."> <br>

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" class="form-control"><?php echo $producto->descripcion ?></textarea> <br>

			<label for="precioVenta">Precio de venta:</label>
			<input value="<?php echo $producto->precioVenta ?>"  name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta"> <br>

			<label for="precioCompra">Precio de compra:</label>
			<input value="<?php echo $producto->precioCompra ?>"name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra"> <br>

			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>"  name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia"> <br>
			<br><br><input type="submit" value="Guardar">
			
		</form>
	</div>
	</div>
	</div>
</body>
</html>
