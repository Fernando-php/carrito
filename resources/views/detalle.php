    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="StyleSheet" href="../css/estilos.css" type="text/css"> -->
        <title>Document</title>
    </head>

    <body>
        <img style="width:500px" src="../imagen/<?= $_SESSION['productos'][$producto][2] ?>" />
        <?php
        echo "<h1>" . $producto . "</h1>";
        echo "<strong>Precio: </strong>" . $_SESSION['productos'][$producto][0];
        echo "<br><strong>Detalle: </strong>" . $_SESSION['productos'][$producto][1];
        ?>
        <form action="../meteCarro/<?= $producto ?>" method="get">
            <input type="submit" value="Comprar">
        </form>
        <h3><a href="../">VOLVER</a></h3>

    </body>

    </html>