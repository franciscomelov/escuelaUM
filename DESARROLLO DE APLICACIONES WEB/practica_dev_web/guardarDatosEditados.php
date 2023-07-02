<?php


#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioCompra = $_POST["precioCompra"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, existencia = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioCompra, $precioVenta, $existencia, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Error!!!";
?>