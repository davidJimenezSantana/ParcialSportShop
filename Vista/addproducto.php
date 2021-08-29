<?php

$cantidad = $_GET["cant"];

if (isset($_POST["guardar"])) {
        for ($i = 0; $i < $cantidad; $i++) 
        {
            $n = $_POST["nombre" . ($i)];
            $p = $_POST["precio" . ($i)];
            $t = $_POST["talla" . ($i)];
            $c = $_POST["categoria" . ($i)];
            $producto = new Producto("", $n, $p, $t, $c);
            $producto->insertar();
        }
    }
?>
<h1 style="color: snow;">AGREGADO CORRECTAMENTE!</h1>