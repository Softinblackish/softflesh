<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la compra.
    $no_compra= $_POST['no_compra']; 
    $fecha_orden=$_POST["fecha_orden"]; 
    $hora=$_POST['hora'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $direccion_proveedor= $_POST['direccion_proveedor'];
    $tel_proveedor= $_POST['tel_proveedor'];
    $email_proveedor= $_POST['email_proveedor'];
    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $valor_total= $_POST['valor_total'];
    $nota= $_POST['nota'];
    
    //echo $empresa . " " .$no_compra." ".$fecha_orden." ".$hora." ".$nombre_proveedor." ".$direccion_proveedor." ".$tel_proveedor.  " ".$email_proveedor." ".$articulo." ".$precio_compra." ".$cantidad." ".$valor_total." ".$nota;
   
        $Reg_compras = $conexion->query("insert into $empresa.tbl_compras_temp (no_compra, fecha_orden, hora, nombre_proveedor, direccion_proveedor,  tel_proveedor,email_proveedor,articulo, precio_compra, cantidad, valor_total, nota)
            values ($no_compra, '$fecha_orden', '$hora', '$nombre_proveedor', '$direccion_proveedor','$tel_proveedor', '$email_proveedor', '$articulo',   $precio_compra, $cantidad, $valor_total, '$nota')
            ");
    
//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>