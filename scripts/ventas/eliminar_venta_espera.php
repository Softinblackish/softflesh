<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $id_temp = $_GET["id"];

     $eliminar_espera = $conexion->query("DELETE FROM $empresa.tbl_venta_temp where id_venta = $id_temp");
    header("location: ../../views/venta/venta_espera.php");
?>