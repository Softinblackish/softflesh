<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id=$_GET["id"];
    $conexion->query("DELETE FROM $empresa.tbl_cod_impuestos WHERE id_cod_impuesto = $id");
    header("location:../../views/administracion/ver_impuestos.php");
?>