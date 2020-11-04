<?php
     include("../conexion/cone.php");
     session_start();
     $empresa= $_SESSION["empresa_db"];
     
     $ventas= $_POST["venta"];
     $total_caja = $_POST["caja"];
     $apertura = $_POST["apertura"];
     $total = $_POST["total"];
     $diferencia = $_POST["diferencia"];

     $caja = $_SESSION["caja"];
     $usuario = $_SESSION["user"];

     $consulta_sucursal = $conexion->query("SELECT caja_sucursal from $empresa.tbl_cajas where ip = '$caja' ");
     $resultado = $consulta_sucursal->fetch_assoc();

     $sucursal = $resultado["caja_sucursal"];
     echo $ventas;

     $insert_cierre = $conexion->query("INSERT into $empresa.tbl_cierre_caja (sucursal, caja, diferencia, vendido, total, total_caja, apertura, creado_por) value ('$sucursal', '$caja', $diferencia, $ventas, $total, $total_caja, $apertura,'$usuario')");
   
     //header("location:../../views/venta/cierre_ventas.php");

?>