<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $id_temp = $_GET['id_temp'];
    $consulta_venta_temp = $conexion->query("SELECT * from $empresa.tbl_venta_temp where id_venta = $id_temp limit 1");
    $resultado = $consulta_venta_temp->fetch_assoc();
    $id = $resultado["id_venta_temp"];
    $en_espera = $conexion->query("UPDATE $empresa.tbl_venta_temp SET en_espera = 1 where id_venta_temp = $id");
    header("location:../../views/venta/punto_de_venta.php");
?>