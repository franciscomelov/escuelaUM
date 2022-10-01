<?php


$nombre=$_POST["cajita_nombre"];
$direccion=$_POST["cajita_direccion"];
$telefono=$_POST["cajita_telefono"];
$correo=$_POST["cajita_correo"];
$password=$_POST["cajita_password"];


// Realizando conexion con servidor sql

$con = mysqli_connect ("localhost", "root", "", "escuelaDB") or die("Ocurrio un error al conectarse en la base de datos");

$query = "INSERT INTO alumnos(nombre, direccion, telefono, correo, password) values ('$nombre', '$direccion', '$telefono', '$correo', '$password')";

mysqli_query($con, $query) or die ("Error, el query fallo");

mysqli_close($con);

?>


