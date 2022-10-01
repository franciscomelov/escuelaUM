<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device, initial-scale1.0">
	<title>Index</title>
	<style>
		table, th, td{
		border: 1px solid black;}
	</style>
</head>

<body>
	<h1>Bienvenido esta es mi primer aplicacion</h1>
	
	<iframe name="guardar" id="guardar" style="display: none;"></iframe>
	<form action="guardar.php" method="post" target="guardar">
		<label>Ingrese los siguientes datos</label><br><br>
		

		<label>Nombre: </label>
		<input type="text" name="cajita_nombre" id="cajita_nombre" placeholder="Escribe tu nombre..." /> <br><br>
		
		<label>direccion: </label>
		<input type="text" name="cajita_direccion" id="cajita_direccion" placeholder="Escribe tu direccion..." /> <br><br>
		
		<label>Telefono: </label>
		<input type="text" name="cajita_telefono" id="cajita_telefono" placeholder="Escribe tu telefono..." /> <br><br>
	
		<label>Correo: </label>
		<input type="email" name="cajita_correo" id="cajita_correo" placeholder="Escribe tu correo..." /> <br><br>

		<label>Contraseña: </label>
		<input type="password" name="cajita_password" id="cajita_password" placeholder="Escribe tu contraseña..." /> <br><br>
		
		<input type="submit" value="Enviar datos" onclick="alert('Usuario añadido');" />
	</form>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
    var auto_refresh = setInterval(
    function ()
    {
    $('#table_info').load('lista_alumnos.php');
    }, 1000); // refresh every 1000 milliseconds
</script>
<div id="table_info"></div>
</body>

</html>
