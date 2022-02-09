<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" href="./css/estilos.css" type="text/css">
    <title>ContenidoCesta</title>
</head>
<body>
    <?php
    echo '<table border = "1"><tr><th colspan="4"><h3>PRODUCTOS EN TU CESTA</h3></th></tr>';
        foreach ($_SESSION['enCesta'] as $prod => $cantidad) {
            echo'<tr><td>'.$prod.'</td><td>'.$cantidad.'</td><td><img style="width:100px" src="../public/imagen/'. $_SESSION['productos'][$prod][2]. 
                    '"/><br>'.$prod.'<br>'.$_SESSION['productos'][$prod][0].' euros</td><td>';
            ?>
            <form action="quitaCarro/<?=$prod?>" method="get">
                <input type="submit" value="Quitar uno">
            </form>
            <?php
            echo '</td></tr>';
        }  
    
    echo '<tr><td>Total</td><td>' . $_SESSION['cantidad'] . '</td><td>' 
    . $_SESSION['total']. '</td><td><a href="./">VOLVER</a></td></tr></table>';
    ?>
</body>
</html>
