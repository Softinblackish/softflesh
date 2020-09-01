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
    $auto_rol = $conexion->query("INSERT INTO $empresa.roles (nombre_rol, descripcion_rol, creado_por) VALUES ('super_admin','Rol del inscriptor', 'SYSTEM')");
    $auto_permisos = $conexion->query("INSERT INTO $empresa.tbl_permisos (rol) VALUES ('super_admin')");

    header("location:../views/login/login.php");
?>