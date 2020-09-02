<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id=$_GET["id"];
    $conexion->query("DELETE FROM $empresa.roles WHERE id_rol = $id");
    header("location:../../views/administracion/ver_roles.php");
?>