<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION['empresa_db'];
    $nombre = $_POST['user'];
    $pass = $_POST["pass"];
    $rol = $_POST['rol'];
    $status= $_POST["status"];
    echo $empresa." ".$nombre . " ". $pass. " ". $rol . " ". $status;

    $nuevo_usuario=$conexion->query("INSERT INTO $empresa.tbl_usuario (nombre_usuario, contrasena_usuario, rol_usuario) values('$nombre', '$pass','$rol') ");
    header("location:../../views/usuarios/nuevo_usuario.php?agregado = true");

?>