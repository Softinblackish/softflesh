<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $resultado = $conexion->query("select * from $empresa.tbl_compras");

    header('location: ../../views/compras/frm_compras.php')
?>