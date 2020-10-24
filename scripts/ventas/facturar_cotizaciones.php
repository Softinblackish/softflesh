<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $id_cotizacion = $_GET["id_cotizacion"];

    $consulta_cotizaciones = $conexion->query("select * from $empresa.tbl_cotizaciones where id_cotizacion = $id_cotizacion");
    while($registros_cotizaciones = $consulta_cotizaciones->fetch_assoc())
    {
        
        $id_temp = $registros_cotizaciones['id_venta_temp'];
        $itbis = $registros_cotizaciones['itbis']; 
        $precio = $registros_cotizaciones['precio']; 
        $total = $registros_cotizaciones['total']; 
        $precio = $registros_cotizaciones['precio']; 
        $total = $registros_cotizaciones['total']; 
        $insertar_venta= $conexion->query("INSERT INTO $empresa.tbl_ventas (id_venta_temp ,id_cliente, tipo_comprobante, condicion_pago, forma_pago, itbis, precio, total, comprobante, creado_por) values
        ($id_temp, 1, 'valor fiscal', 'Wasacaca', 'efectivo', $itbis,$precio, $total, 'B0200065652', 'Test' )");
    }
   
?>