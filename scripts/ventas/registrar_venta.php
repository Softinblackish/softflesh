<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cliente = $_POST["cliente"];
    $condicion = $_POST["condicion"];
    $comprobante = $_POST["comprobante"];
    $forma = $_POST["forma"];
    $itebis = $_POST['itbis'];
    $precio = $_POST["precio"];
    $total = $_POST["total"];
    $id_temp = $_POST["id_temp"];

    echo $id_temp;

    $insertar_venta = $conexion->query("INSERT INTO $empresa.ventas (id_temp,cliente, condicion_pago, comprobante, forma_pago, itbis_total, precio_total, total, creado_por) 
                                                            values($id_temp, '$cliente','$condicion', '$comprobante', '$forma', $itebis, $precio, $total, '$usuario')");

    header("location: ../../views/venta/punto_de_venta.php");
?>