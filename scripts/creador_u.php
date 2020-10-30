<?php
    $empresa = $_POST['empresa'];
    $nombre= $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    echo $empresa;
    include("conexion/cone.php");

    $empresa_sin_espacio = str_replace(" ","_",$empresa);
    $crear_usuario = $conexion->query("INSERT INTO $empresa_sin_espacio.tbl_usuario (nombre_usuario, contrasena_usuario, rol_usuario, status) values ('$nombre', '$contrasena', 'super_admin','activo')");
    //header("location:../views/login/login.php");


    $crear_usuario = $conexion->query("
        insert INTO $empresa.tbl_usuario
        (nombre_usuario, contrasena_usuario, rol_usuario, status) 
        values
        ('$nombre','$contrasena','super_admin','activo')
        
        ");
    $tipos_comprobantes = $conexion->query(" INSERT INTO $empresa.tbl_comprobantes (tipo, proximo, maximo, cantidad_alerta) values ('Valor fiscal',1,5,1)");
    $tipos_comprobantes = $conexion->query(" INSERT INTO $empresa.tbl_comprobantes (tipo, proximo, maximo, cantidad_alerta) values ('Consumidor final',1,5,1)");
    $tipos_comprobantes = $conexion->query(" INSERT INTO $empresa.tbl_comprobantes (tipo, proximo, maximo, cantidad_alerta) values ('Gubernamental',1,5,1)");
    $tipos_comprobantes = $conexion->query(" INSERT INTO $empresa.tbl_comprobantes (tipo, proximo, maximo, cantidad_alerta) values ('Proveedor informal',1,5,1)");
    $tipos_comprobantes = $conexion->query(" INSERT INTO $empresa.tbl_comprobantes (tipo, proximo, maximo, cantidad_alerta) values ('Gastos menores',1,5,1)");

    $auto_condicion_p = $conexion->query(" INSERT INTO $empresa.tbl_condiciones_pago (nombre_condicion_p, dias_condicion_p, descripcion_condicion_p, creado_por) values ('Al contado','0','fsfs','SYSTEM')");
    
    $auto_cod_impuesto = $conexion->query("INSERT INTO $empresa.tbl_cod_impuestos (nom_codigo, porciento) values ('N/A',0)");
    
    $auto_rol = $conexion->query("INSERT INTO $empresa.roles (nombre_rol, descripcion_rol, creado_por) VALUES ('super_admin','Rol del inscriptor', 'SYSTEM')");
    
    $auto_permisos = $conexion->query("INSERT INTO $empresa.tbl_permisos (rol) VALUES ('super_admin')");
    
    $auto_cliente = $conexion->query("INSERT INTO $empresa.tbl_clientes (nombre_cliente, referencia, condicion_pago, creado_por) values ('Generico',' Ninguna','Al contado','System')");
    
    header("location:../views/login/login.php");

?>