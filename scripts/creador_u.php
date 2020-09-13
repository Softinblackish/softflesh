<?php
    $empresa = $_POST['empresa'];
    $nombre= $_POST["nombre"];
    $contraseña = $_POST["contrasena"];
    echo $empresa;
    include("conexion/cone.php");

    $empresa_sin_espacio = str_replace(" ","_",$empresa);
    $crear_usuario = $conexion->query("INSERT INTO $empresa_sin_espacio.tbl_usuario (nombre_usuario, contrasena_usuario, rol_usuario, status) values ('$nombre', '$contraseña', 'super_admin','activo')");
    //header("location:../views/login/login.php");


    $crear_usuario = $conexion->query("
        insert INTO $empresa.tbl_usuario
        (nombre_usuario, contraseña_usuario, rol_usuario, status) 
        values
        ('$nombre','$contraseña','super_admin','activo')
        
        ");
    $auto_rol = $conexion->query("INSERT INTO $empresa.roles (nombre_rol, descripcion_rol, creado_por) VALUES ('super_admin','Rol del inscriptor', 'SYSTEM')");
    $auto_permisos = $conexion->query("INSERT INTO $empresa.tbl_permisos (rol) VALUES ('super_admin')");
    $auto_cliente = $conexion->query("INSERT INTO $empresa.tbl_clientes (nombre_cliente, tipo_comprobante, condicion_pago) values ('Genérico','Consumidor final','Al contado')");
    header("location:../views/login/login.php");

?>