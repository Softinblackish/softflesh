<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $id_articulo = $_GET["id_articulo"];
    $id_temp = $_GET["id_temp"];

    $borrar_articulo = $conexion->query("DELETE FROM $empresa.tbl_venta_temp where id_venta_temp = $id_articulo and id_venta = $id_temp");
    header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp");
?>