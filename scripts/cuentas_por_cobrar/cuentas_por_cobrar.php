<?php
    include("../conexion/cone.php");

    $nombre= $_POST['nombre']; 
    $detalle=$_POST["detalle"]; 
    $cantidad=$_POST['cantidad']; 
    $price= $_POST['price']; 
    $total= $_POST['total']; 
    
   
        $conexion->query("insert into cxcobrar (cxc_nombre, cxc_detalle, cxc_cantidad, cxc_price, cxc_total)
            values ('$nombre', '$detalle', '$cantidad', '$price', '$total')");
    
//cxcobrar y cxpagar  
    header('location: ../../views/cuentas_por_cobrar.php')
?>