<?php
    include("../conexion/cone.php");
    $no_compra= $_POST['no_compra'];     
    $fecha_orden= $_POST['fecha_orden']; 
    $suplidor=$_POST["suplidor"];
    $tel_proveedor=$_POST['tel_proveedor']; 
    $precio_compra=$_POST['precio_compra'];
    $cantidad=$_POST['cantidad']; 
    $valor_total=$_POST['valor_total'];
    session_start();
    $empresa= $_SESSION["empresa_db"];
    
    $conexion->query("UPDATE $empresa.tbl_compras  SET fecha_orden='$fecha_orden', suplidor='$suplidor', tel_proveedor= '$tel_proveedor', precio_compra= $precio_compra , cantidad = $cantidad, valor_total = $valor_total  where no_compra = $no_compra");