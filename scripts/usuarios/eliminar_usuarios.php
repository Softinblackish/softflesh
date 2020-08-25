<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id=$_GET["id"];
    $eliminar_usuario=$conexion->query("DELETE FROM $empresa.tbl_usuario WHERE id_usuario = $id");
    header("location:../../views/usuarios/lista_usuarios.php");
?>