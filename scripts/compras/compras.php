<?php
    include("../conexion/cone.php");

    $no_compra= $_POST['no_compra']; 
    $fecha=$_POST["fecha_orden"]; 
    $hora=$_POST['hora'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $direccion= $_POST['direccion'];
    $tel_proveedor= $_POST['tel_proveedor'];
    $email_proveedor= $_POST['email_proveedor'];
    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $valor_total= $_POST['valor_total'];
    $total_general= $_POST['total_general'];
    $nota= $_POST['nota'];
    session_start();
    $empresa= $_SESSION["empresa_db"];
   
        $conexion->query("insert into $empresa.tbl_compras (no_compra, fecha, hora, nombre_proveedores, direccion, nombre, precio_compra, cantidad, valor_total, total_general)
            values ('$no_compra', '$fecha', '$hora', '$nombre_proveedor', '$direccion', '$articulo', '$precio_compra', '$cantidad', '$valor_total', '$total_general' )");
    
//cxcobrar y cxpagar
    header('location: ../../views/compras/compras.php?registro="si"')
?>