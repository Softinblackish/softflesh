<?php
    include("../conexion/cone.php");

    $no_compra= $_POST['no_compra']; 
    $fecha=$_POST["fecha"]; 
    $hora=$_POST['hora'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $direccion= $_POST['direccion'];
    //Datos de los articulos 
    $nombre= $_POST['nombre'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $total= $_POST['valor_total'];
    $total_general= $_POST['total_general'];
   
        $conexion->query("insert into tbl_compras (no_compra, fecha, hora, nombre_proveedores, direccion, nombre, precio_compra, cantidad, valor_total, total_general)
            values ('$no_compra', '$fecha', '$hora', '$nombre_proveedor', '$direccion', '$nombre', '$precio_compra', '$cantidad', '$total', '$total_general' )");
    
//cxcobrar y cxpagar
    header('location: ../../views/compras/compras.php')
?>