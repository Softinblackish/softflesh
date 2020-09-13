<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cliente = 1;
    $condicion = $_POST["condicion"];
    $comprobante = $_POST["tipo_comprobante"];
    $forma = $_POST["forma"];
    $itebis = $_POST['itbis'];
    $precio = $_POST["precio"];
    $total = $_POST["total"];
    $id_temp = $_POST["id_temp"];

    $insertar_venta = $conexion->query("INSERT INTO $empresa.tbl_ventas (id_venta_temp, id_cliente, condicion_pago, tipo_comprobante, comprobante, forma_pago, itbis, precio, total, creado_por) 
                                                            values($id_temp, $cliente,'$condicion', '$comprobante','B02000000124', '$forma', $itebis, $precio, $total, '$usuario')");

    $consulta_factura = $conexion->query("SELECT id_venta FROM $empresa.tbl_ventas ORDER BY id_venta desc limit 1");
    $registro_factura = $consulta_factura->fetch_assoc();
    $id= $registro_factura["id_venta"];

    //header("location: ../../views/venta/factura_venta.php?id_venta=$id ");
?>