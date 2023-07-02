<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ventas</title>


	<link rel="stylesheet" href="./css/estilo.css">
</head>
<body>
<?php
session_start();

if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div >
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div>
				Vendido
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div >
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div>
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div>
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div>
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="codigo">Código de barras:</label>
		<input  name="codigo" required type="text" id="codigo" placeholder="codigo..">
	</form>
	<br><br>

	<table >
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Precio de venta</th>
				<th>Cantidad</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
				$granTotal += $producto->total;
			?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" required type="number" value="<?php echo $producto->cantidad; ?>">
						</form>
					</td>
					<td><?php echo $producto->total ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" >Terminar venta</button>
		<a href="./cancelar.php" >Cancelar venta</a>
	</form>



</div>
</div>


</body>
</html>
