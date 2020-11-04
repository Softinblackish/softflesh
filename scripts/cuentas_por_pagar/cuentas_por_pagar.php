<?php
    include("../conexion/cone.php");

    $nombre= $_POST['nombre']; 
    $detalle=$_POST["detalle"]; 
    $cantidad=$_POST['cantidad']; 
    $price= $_POST['price']; 
    $total= $_POST['total']; 
    
   
        $conexion->query("insert into cuentas_por_pagar (nombre, detalle, cantidad, price, total)
            values ('$nombre', '$detalle', '$cantidad', '$price', '$total')");
    

    header('location: ../../views/cuentas_por_pagar.php?registro="si"')
?>