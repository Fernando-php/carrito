<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="css/estilos.css" type="text/css">
    <title>ListadoProductos</title>
</head>
<body>
<table>
    <tr><th><img id="logo" src="imagen/tiendecita.png" alt=""></th><th colspan="3"><h1>LA TIENDECITA INFORMÁTICA</h1></th></tr>
<tr><th>Producto</th><th>Precio</th><th>Imagen</th><th><a href="cesta">CESTA <?=$_SESSION['cantidad']?>Prod</th></tr>
<?php 
  foreach ($_SESSION['productos'] as $prod => $producto) { 
?>
    <tr><td><?=$prod?></td>
    <td><?=$producto[0]?></td>
    <td><a href="detalle/<?=$prod?>"><img style="width:100px" src="imagen/<?=$producto[2]?>"/></td>
    <td>    
    <form action="meteCarro/<?=$prod?>" method="get">
        <input type="submit" value="Comprar">
    </form>
    </td></tr>
<?php } ?>
</table>
</body>
</html>