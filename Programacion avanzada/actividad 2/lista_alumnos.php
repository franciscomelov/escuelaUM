<table id="table_info" class="table table-bordered" cellspacing="0" cellpadding="10" >
    <tr>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Correo</th>
        <th>telefono</th>
    </tr>

<?php
// Realizando conexion con servidor sql

$con = mysqli_connect ("localhost", "root", "", "escuelaDB") or die("Ocurrio un error al conectarse en la base de datos");

$query = "Select * FROM ALUMNOS";

$list = mysqli_query($con, $query) or die ("Error, el query fallo");

foreach ($list as $rs) {
    ?>
    <tr>
        <td><?php echo $rs['nombre']; ?></td>
        <td><?php echo $rs['direccion']; ?></td>
        <td><?php echo $rs['correo']; ?></td>
        <td><?php echo $rs['telefono']; ?></td>
        <br>
    </tr>
    <?php
    
}
mysqli_close($con);
?>
</table>