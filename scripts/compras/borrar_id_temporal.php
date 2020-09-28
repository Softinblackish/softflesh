<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    $resultado = $conexion->query("truncate table $empresa.tbl_compra_id_temp");

    header('location: ../../views/compras/frm_compras.php')
?>