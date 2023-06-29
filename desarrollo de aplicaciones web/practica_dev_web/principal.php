<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <header>
        <h2>Panaderia San Andres</h2>
        <img src="./img/portada.jpg" alt="Imagen de un monitor">
        <h3>Bienvenid@</h3>
        <button onClick="popUpProductos();">Productos</button>
        <button onClick="popUpVender()">Vender</button>
        <button onClick="popUpVentas()">ventas</button>
</header>
<div id="table_info"></div>


    </main>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<script type="text/javascript">
    var auto_refresh = setInterval(
    function () {
    $('#table_info').load('listar.php');
    }, 1000); // refresh every 1000 milliseconds
</script>
    <script>

        function popUpProductos(){
            var url = "./listar.php";
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }

        function popUpVender(){
            var url = "./vender.php";
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }

        function popUpVentas(){
            var url = "./ventas.php";
            myRef = window.open(url ,'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0');
            myRef.focus()
        }
    </script>
</body>
</html>
