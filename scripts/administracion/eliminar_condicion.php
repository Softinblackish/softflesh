<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id=$_GET["id"];
    $conexion->query("DELETE FROM $empresa.tbl_condiciones_pago WHERE id_condicion_p = $id");
    header("location:../../views/administracion/ver_condiciones_pago.php");
?>