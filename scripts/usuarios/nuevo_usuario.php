<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION['empresa'];
    $nombre = $_POST['user'];
    $pass = $_POST["pass"];
    $rol = $_POST['rol'];
    $status= $_POST["status"];
    
    $empresa_sin_espacio= str_replace(" ","_",$empresa);

    $nuevo_usuario=$conexion->query("INSERT INTO $empresa_sin_espacio.tbl_usuario (nombre_usuario, contraseña_usuario, rol_usuario, status ) values('$nombre', '$pass','$rol', '$status') ");
    header("location:../../views/usuarios/nuevo_usuario.php?agregado = true");
?>