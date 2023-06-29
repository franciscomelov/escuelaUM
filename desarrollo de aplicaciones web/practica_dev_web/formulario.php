<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>
		<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>

<div >
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input  name="codigo" required type="text" id="codigo" placeholder="Escribe el código"><br>

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" ></textarea><br>

		<label for="precioVenta">Precio de venta:</label>
		<input  name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta"><br>

		<label for="precioCompra">Precio de compra:</label>
		<input  name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra"><br>

		<label for="existencia">Existencia:</label>
		<input name="existencia" required type="number" id="existencia" placeholder="Cantidad"><br>
		<br><br><input type="submit" value="Guardar">
	</form>
</div>
</div>
	</div>
</body>
</html>