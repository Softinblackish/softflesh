<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id=$_GET["id"];
    $conexion->query("DELETE FROM $empresa.tbl_sucursal WHERE id_sucursal = $id");
    header("location:../../views/administracion/ver_sucursales.php");
?>