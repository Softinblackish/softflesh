<?php
    $empresa = $_POST['empresa'];
    $nombre= $_POST["nombre"];
    $contraseña = $_POST["contraseña"];
    echo $empresa;
    include("conexion/cone.php");

    $crear_usuario = $conexion->query("
        insert INTO $empresa.tbl_usuario
        (nombre_usuario, contraseña_usuario, rol_usuario, status) 
        values
        ('$nombre','$contraseña','super_admin','activo')
        
        ");
    header("location:../views/login/login.php");
?>