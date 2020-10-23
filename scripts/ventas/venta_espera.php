<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $id_temp = $_GET['id_temp'];

    $en_espera = $conexion->query("UPDATE $empresa.tbl_venta_temp SET en_espera = 1 where id_venta = $id_temp");
    header("location:../../views/venta/punto_de_venta.php");
?>