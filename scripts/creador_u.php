<?php
    $empresa = $_POST['empresa'];
    $nombre= $_POST["nombre"];
    $contraseña = $_POST["contrasena"];
    echo $empresa;
    include("conexion/cone.php");
    $empresa_sin_espacio = str_replace(" ","_",$empresa);
    $crear_usuario = $conexion->query("INSERT INTO $empresa_sin_espacio.tbl_usuario (nombre_usuario, contrasena_usuario, rol_usuario, status) values ('$nombre', '$contraseña', 'super_admin','activo')");
    //header("location:../views/login/login.php");
?>