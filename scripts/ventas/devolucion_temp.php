<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];

    $articulo = $_GET["articulo"];
    $id_temp = $_GET["factura"];
    $cantidad_envio = $_GET["cantidad"];

    $consulta_temp = $conexion->query("SELECT * from $empresa.tbl_venta_temp where id_venta = $id_temp and id_articulo = $articulo");
    $resultado_temp = $consulta_temp->fetch_assoc();


    $cantidad_actual = $resultado_temp["cantidad"];
    $cantidad_new= $cantidad_actual - $cantidad_envio; 
    
    
    $consulta_articulo = $conexion->query("SELECT precio, cod_impuesto from $empresa.tbl_articulos where id_articulo = $articulo");
    $resultado_articulo = $consulta_articulo->fetch_assoc();
    $cod_impuesto_id = $resultado_articulo["cod_impuesto"];
    $precio = $resultado_articulo["precio"];

    $consulta_impuesto = $conexion->query("SELECT * from $empresa.tbl_cod_impuestos where id_cod_impuesto =  $cod_impuesto_id");
    $resultado_impuesto = $consulta_impuesto->fetch_assoc();
    $impuesto_porciento = $resultado_impuesto["porciento"];

    $itbis_porciento = $impuesto_porciento /100;
    $itbis = $precio * $itbis_porciento;
    $precio_venta = $precio * $cantidad_envio;
    $total = $precio_venta + $itbis;

    #$articulo_actualizacion = $conexion->query("UPDATE $empresa.tbl_venta_temp SET cantidad = $cantidad_new, precio = $precio_venta, itbis= $itbis, total = $total  where id_venta = $id_temp and id_articulo = $articulo");

    #$articulo_actualizacion = $conexion->query("UPDATE $empresa.tbl_venta_temp SET cantidad = $cantidad_new, precio = $precio_venta, itbis= $itbis, total = $total  where id_venta = $id_temp and id_articulo = $articulo");

    $insertar = $conexion->query("INSERT INTO $empresa.tbl_devoluciones_det (id_articulo, cantidad, valor_devuelto, id_venta_temp) values ($articulo, $cantidad_envio, $total, $id_temp)");

    #$borrar_articulo = $conexion->query("DELETE FROM $empresa.tbl_venta_temp where id_venta_temp = $id_articulo and id_venta = $id_temp");
    
?>