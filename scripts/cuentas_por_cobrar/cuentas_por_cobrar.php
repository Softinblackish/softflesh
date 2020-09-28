<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $nombre= $_POST['nombre']; 
    $detalle=$_POST["detalle"]; 
    $cantidad=$_POST['cantidad']; 
    $price= $_POST['price']; 
    $total= $_POST['total']; 
    
   
        $conexion->query("INSERT into tbl_cxp_cobrar (nombre, detalle, cantidad, price, total)
            values ('$nombre', '$detalle', '$cantidad', '$price', '$total')");
    
//cxcobrar y cxpagar
    header('location: ../../views/cuentas_por_cobrar.php?registro="si"')
?>