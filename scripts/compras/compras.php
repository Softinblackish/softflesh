<?php
    include("../conexion/cone.php");

    $no_compra= $_POST['no_compra']; 
    $fecha=$_POST["fecha"]; 
    $hora=$_POST['hora'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedores']; 
    $direccion= $_POST['direccion'];
    //Datos de los articulos 
    $nombre= $_POST['nombre'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $total= $_POST['total'];
    $total_general= $_POST['total_general'];
   
        $conexion->query("insert into tbl_compras (comp_no_compra, comp_fecha, comp_hora, comp_nombre_proveedores, comp_direccion, comp_nombre, comp_precio_compra, comp_cantidad, comp_total, comp_total_general)
            values ('$no_compra', '$fecha', '$hora', '$nombre_proveedor', '$direccion', '$nombre', '$precio_compra', '$cantidad', '$total', '$total_general' )");
    
//cxcobrar y cxpagar
    header('location: ../../views/compras/compras.php')
?>