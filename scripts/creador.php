<?php
    include("conexion/cone.php");
    $db_empresa= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $telefono= $_POST['telefono'];
    $rnc= $_POST['rnc'];
    $correo= $_POST['correo'];
    $encargado= $_POST['encargado'];
    $tel_encargado= $_POST['tel_encargado'];

   

    /*$empresas_existentes= $conexion->query("SELECT nombre_empresa from empresas_suscritas.informacion_empresa where nombre_empresa = '$db_empresa'");
    $verificacion_empresas_existentes = $empresas_existentes->num_rows;
    echo $verificacion_empresas_existentes; 
    if($verificacion_empresas_existentes < 1)
    {
*/
      $nombre_sin_espacio = str_replace(" ", "_", $db_empresa);
      $registrar_empresa = $conexion->query("INSERT INTO empresas_suscritas.informacion_empresa (nombre_empresa, direccion_empresa, telefono_empresa, rnc_empresa, correo_empresa, encargado, telefono_encargado) value ('$db_empresa','$direccion','$telefono', '$rnc', '$correo','$encargado', '$tel_encargado')");
      $crear_db = $conexion->query("CREATE DATABASE IF NOT EXISTS $nombre_sin_espacio");
      $tabla_articulo = $conexion->query("
        CREATE TABLE $nombre_sin_espacio.tbl_articulos (
        `id_articulo` int(11) NOT NULL AUTO_INCREMENT ,
        `nombre` varchar(100) NOT NULL,
        `descripcion` varchar(200) NOT NULL,
        `codigo` varchar(100) NOT NULL,
        `stop_min` int(10) NOT NULL,
        `codigo_barra` varchar(200) NOT NULL,
        `categoria` varchar(50) NOT NULL,
        `almacen` varchar(50) NOT NULL,
        `status` varchar(20) NOT NULL,
        `creado_por` varchar(100) NOT NULL,
        `fecha_creacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `cantidad_actual` int(6) NOT NULL,
        `cantidad_disponible` int(6) NOT NULL default 0,
        `fecha_modificacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `unidad` varchar(100) NOT NULL default 0,
        PRIMARY KEY (`id_articulo`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

    $tabla_impuestos = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_cod_impuestos (
        `id_cod_impuesto` int(11) NOT NULL AUTO_INCREMENT ,
        `nom_codigo` varchar(100) NOT NULL,
        `porciento` int(3) NOT NULL,
        PRIMARY KEY (`id_cod_impuesto`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_compra = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_compras (
        `id_compra` int(11) NOT NULL AUTO_INCREMENT,
        `suplidor` varchar(200) NOT NULL,
        `comprobante` varchar(50) NOT NULL,
        `cod_impuesto` varchar(50) NOT NULL,
        `forma_pago` varchar(50) NOT NULL,
        `moneda` varchar(50) NOT NULL,
        `entregar_a` varchar(200) NOT NULL,
        `nota` varchar(300) NOT NULL,
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `condicion_pago` varchar(100) NOT NULL,
        `valor_impuestos` int(11) NOT NULL,
        `sin_impuestos` int(11) NOT NULL,
        `valor_total` int(11) NOT NULL,
        `no_compra` int(11),
        `hora` TIMESTAMP,
        `articulo` varchar(45),
        `tel_proveedor` VARCHAR(15),
        `direccion_provedor` varchar(45),
        `email_proveedor` varchar(45),
        `precio_compra` DOUBLE,
        `stock` int(11) NOT NULL,
        `cantidad` int(11) NOT NULL,
        
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      $tabla_det_compra = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_det_compras (
        `id_det_compra` int(11) NOT NULL AUTO_INCREMENT,
        `id_compra` int(11) NOT NULL,
        `cod_articulo` varchar(50) NOT NULL,
        `nom_articulo` varchar(100) NOT NULL,
        `cantidad` float NOT NULL,
        `itbis` float NOT NULL,
        `valor` float NOT NULL,
        `total` float NOT NULL,
        PRIMARY KEY (`id_det_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_tmp_compra= $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_tmp_compras (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `tmp_id_compra` int(100) NOT NULL,
        `cod_articulo` varchar(50) NOT NULL,
        `articulo` varchar(200) NOT NULL,
        `cantidad` int(6) NOT NULL,
        `itbis` float NOT NULL,
        `valor` float NOT NULL,
        `total` float NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_tmp_compra= $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_suplidores (
        `id_sup` int(10) NOT NULL AUTO_INCREMENT,
        `nombre_sup` varchar(100),
        `articulo` varchar(200) NOT NULL,
        `descripcion_sup` varchar(100),
        `precio` float,
        `unidad` varchar(50),
        `telefono` varchar(15),
        `direccion` varchar(100),
        PRIMARY KEY (`id_sup`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      $tabla_usuario = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_usuario ( `id_usuario` INT NOT NULL AUTO_INCREMENT , `nombre_usuario` VARCHAR(200) NOT NULL , `contraseña_usuario` VARCHAR(100) NOT NULL , `rol_usuario` VARCHAR(200) NOT NULL , `status` VARCHAR(100) NOT NULL DEFAULT 'Activo' , `fecha_creacion` TIMESTAMP NOT NULL , `nombre` VARCHAR(200) NULL , `cedula_usuario` VARCHAR(50) NULL , `sucursal_usuario` VARCHAR(100) NULL , `ultimo_acceso` TIMESTAMP NULL , `horario` VARCHAR(100) NULL , PRIMARY KEY (`id_usuario`)) ENGINE = InnoDB;

      ");

$perm = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.roles ( 
        `id_rol` INT NOT NULL AUTO_INCREMENT ,
        `nombre_rol` VARCHAR(100) NOT NULL DEFAULT 'vendedor' ,
        `descripcion_rol` VARCHAR(200) NULL ,
        `creado_por` VARCHAR(100) NOT NULL ,
        `fecha_creacion` TIMESTAMP NOT NULL ,
         PRIMARY KEY (`id_rol`)) ENGINE = InnoDB;
");



      $tabla_permisos = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_permisos
       ( `id_permisos` INT NOT NULL AUTO_INCREMENT ,
      `rol` VARCHAR(200) NOT NULL ,
      `usuarios` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_user` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_user` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_user` INT(1) NOT NULL DEFAULT '1' ,
      `ver_user` INT(1) NOT NULL DEFAULT '1' ,
      `administracion` INT(1) NOT NULL DEFAULT '1' ,
      `roles` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_roles` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_roles` INT(1) NOT NULL DEFAULT '1' ,
      `ver_roles` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_roles` INT(1) NOT NULL DEFAULT '1' ,
      `empresa` INT(1) NOT NULL DEFAULT '1' ,
      `editar_empresa` INT(1) NOT NULL DEFAULT '1' ,
      `cod_impuestos` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_cod_impuestos` INT(1) NOT NULL DEFAULT '1' ,
      `editar_cod_impuestos` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_cod_impuestos` INT(1) NOT NULL DEFAULT '1' ,
      `ver_cod_impuestos` INT(1) NOT NULL DEFAULT '1' ,
      `almacenes` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_almacenes` INT(1) NOT NULL DEFAULT '1' ,
      `ver_almacenes` INT(1) NOT NULL DEFAULT '1' ,
      `editar_almacenes` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_almacenes` INT(1) NOT NULL DEFAULT '1' ,
      `categorias` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_categorias` INT(1) NOT NULL DEFAULT '1' ,
      `ver_categorias` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_categorias` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_categorias` INT(1) NOT NULL DEFAULT '1' ,
      `condiciones_p` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_condiciones_p` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_condiciones_p` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_condiciones_p` INT(1) NOT NULL DEFAULT '1' ,
      `ver_condiciones_p` INT(1) NOT NULL DEFAULT '1' ,
      `clientes` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_clientes` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_clientes` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_clientes` INT(1) NOT NULL DEFAULT '1' ,
      `ver_clientes` INT(1) NOT NULL DEFAULT '1' ,
      `suplidores` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_suplidores` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_suplidores` INT(1) NOT NULL DEFAULT '1' ,
      `ver_suplidores` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_suplidores` INT(1) NOT NULL DEFAULT '1' ,
      `ventas` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_ventar` INT(1) NOT NULL DEFAULT '1' ,
      `editar_ventas` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_ventas` INT(1) NOT NULL DEFAULT '1' ,
      `ver_ventas` INT(1) NOT NULL DEFAULT '1' ,
      `venta_a_credito` INT(1) NOT NULL DEFAULT '1' ,
      `venta_en_espera` INT(1) NOT NULL DEFAULT '1' ,
      `compras` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_compras` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_compras` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_compras` INT(1) NOT NULL DEFAULT '1' ,
      `ver_compras` INT(1) NOT NULL DEFAULT '1' ,
      `cxc` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_cxc` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_cxc` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_cxc` INT(1) NOT NULL DEFAULT '1' ,
      `ver_cxc` INT(1) NOT NULL DEFAULT '1' ,
      `cxp` INT(1) NOT NULL DEFAULT '1' ,
      `agregar_cxp` INT(1) NOT NULL DEFAULT '1' ,
      `eliminar_cxp` INT(1) NOT NULL DEFAULT '1' ,
      `modificar_cxp` INT(1) NOT NULL DEFAULT '1' ,
      `ver_cxp` INT(1) NOT NULL DEFAULT '1' ,
      `compra_a_credito` INT(1) NOT NULL DEFAULT '1' ,
      PRIMARY KEY (`id_permisos`)) ENGINE = InnoDB;

      ");

      $tabla_id = $conexion->query("
      ALTER TABLE `tbl_permisos`
        ADD PRIMARY KEY (`id_permisos`);");

        $tabla_auto = $conexion->query("ALTER TABLE `tbl_permisos`
        MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
      COMMIT;");


      $tabla_roles = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.roles (
        `id_rol` int(11) NOT  AUTO_INCREMENT,
        `nombre_rol` varchar(100) NOT NULL,
        `descripcion_rol` varchar(100) DEFAULT NULL,
        `creado_por` varchar(100) DEFAULT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ");

      $tabla_almacenes = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_almacenes ( 
      `id_almacen` INT NOT NULL AUTO_INCREMENT ,
       `nombre_almacen` VARCHAR(100) NULL DEFAULT NULL , 
       `descripcion_almacen` VARCHAR(100) NULL DEFAULT NULL , 
       `ubicacion_almacen` VARCHAR(200) NULL DEFAULT NULL ,
       `encargado_almacen` VARCHAR(100) NULL DEFAULT NULL , 
       `creado_por` VARCHAR(100) NULL DEFAULT NULL , 
       `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(), 
       PRIMARY KEY (`id_almacen`)) ENGINE = InnoDB;

      ");
      $tabla_categoria = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_categorias (
        `id_categoria` int(11) NOT NULL,
        `nombre_categoria` varchar(200) NOT NULL,
        `descripcion_categoria` varchar(100) NOT NULL,
        `creada_por` varchar(200) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ");

      $tabla_categoria = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_condiciones_pago (
        `id_condicion_p` int(11) NOT NULL,
        `nombre_condicion_p` varchar(200) NOT NULL,
        `dias_condicion_p` varchar(100) NOT NULL,
        `descripcion_condicion_p` varchar(200) NOT NULL,
        `creado_por` varchar(100) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ");
      
      $tabla_categoria = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_clientes (
         `id_cliente` INT NOT NULL AUTO_INCREMENT , 
         `codigo_cliente` VARCHAR(200) NOT NULL , 
         `nombre_cliente` VARCHAR(100) NOT NULL , 
         `Pais` VARCHAR(200) NOT NULL , 
         `provincia` VARCHAR(100) NOT NULL , 
         `direccion` VARCHAR(100) NOT NULL , 
         `telefono_cliente` VARCHAR(100) NOT NULL , 
         `tipo_cliente` VARCHAR(100) NOT NULL , 
         `tipo_comprobante` VARCHAR(100) NOT NULL , 
         `rnc_cliente` VARCHAR(100) NOT NULL , 
         `creado_por` VARCHAR(100) NOT NULL , 
         `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
         `fecha_modificacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
         `modificado_por` VARCHAR(100) NOT NULL , 
         `limite_credito` INT(10) NOT NULL , 
         `condicion_pago` VARCHAR(100) NOT NULL , 
         `status` VARCHAR(10) NOT NULL , PRIMARY KEY (`id_cliente`)) ENGINE = InnoDB;

      ");


      
header("location:../views/creador_u.php?empresa=$nombre_sin_espacio");
/*
      }
      else
      {
        echo ("Empresa ya existe");
      }*/
?>