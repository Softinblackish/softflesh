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
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `cantidad_actual` int(6) NOT NULL,
        `cantidad_disponible` int(6) NOT NULL default 0,
        `fecha_modificacion` varchar(100) NOT NULL,
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
        `fecha_orden` varchar(100) NOT NULL,
        `condicion_pago` varchar(100) NOT NULL,
        `valor_impuestos` int(11) NOT NULL,
        `sin_impuestos` int(11) NOT NULL,
        `valor_total` int(11) NOT NULL,

        `no.compra` int(11),
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
      
      $tabla_usuario = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_usuario (
        `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
        `nombre_usuario` varchar(100) NOT NULL,
        `contraseña_usuario` varchar(100) NOT NULL,
        `rol_usuario` varchar(100) NOT NULL,
        `status` varchar(100) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
         PRIMARY KEY (`id_usuario`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      $tabla_usuario = $conexion->query("
      ALTER TABLE $nombre_sin_espacio.tbl_usuario ADD `nombre` VARCHAR(100) NOT NULL AFTER `fecha_creacion`,
       ADD `cedula_usuario` VARCHAR(50) NOT NULL AFTER `nombre`,
        ADD `sucursal_usuario` VARCHAR(150) NOT NULL AFTER `cedula_usuario`,
         ADD `ultimo_acceso` VARCHAR(50) NOT NULL AFTER `sucursal_usuario`,
          ADD `horario` VARCHAR(100) NOT NULL AFTER `ultimo_acceso`
      ");
      $tabla_permisos = $conexion->query("
      CREATE TABLE `tbl_permisos` (
        `id_permisos` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `usuarios` int(2) DEFAULT 1,
  `modificar_user` int(2) DEFAULT 1,
  `eliminar_user` int(2) DEFAULT NULL,
  `agregar_user` int(2) DEFAULT NULL,
  `ver_user` int(2) DEFAULT NULL,
  `administracion` int(2) DEFAULT NULL,
  `roles` int(2) DEFAULT NULL,
  `agregar_roles` int(2) DEFAULT NULL,
  `modificar_roles` int(2) DEFAULT NULL,
  `ver_roles` int(2) DEFAULT NULL,
  `eliminar_roles` int(2) DEFAULT NULL,
  `empresa` int(2) DEFAULT NULL,
  `ver_empresa` int(2) DEFAULT NULL,
  `editar_empresa` int(2) DEFAULT NULL,
  `cod_impuestos` int(2) DEFAULT NULL,
  `agregar_cod_impuestos` int(2) DEFAULT NULL,
  `editar_cod_impuestos` int(2) DEFAULT NULL,
  `eliminar_cod_impuestos` int(2) DEFAULT NULL,
  `ver_cod_impuestos` int(2) DEFAULT NULL,
  `almacenes` int(2) DEFAULT NULL,
  `agregar_almacenes` int(2) DEFAULT NULL,
  `ver_almacenes` int(2) DEFAULT NULL,
  `editar_almacenes` int(2) DEFAULT NULL,
  `eliminar_almacenes` int(2) DEFAULT NULL,
  `categorias` int(2) DEFAULT NULL,
  `agregar_categorias` int(2) DEFAULT NULL,
  `ver_categorias` int(2) DEFAULT NULL,
  `modificar_categorias` int(2) DEFAULT NULL,
  `eliminar_categorias` int(2) DEFAULT NULL,
  `condiciones_p` int(2) DEFAULT NULL,
  `agregar_condiciones_p` int(2) DEFAULT NULL,
  `ver_condiciones_p` int(2) DEFAULT NULL,
  `modificar_condiciones_p` int(2) DEFAULT NULL,
  `eliminar_condiciones_p` int(2) DEFAULT NULL,
  `clientes` int(2) DEFAULT NULL,
  `agregar_clientes` int(2) DEFAULT NULL,
  `ver_clientes` int(2) DEFAULT NULL,
  `modificar_clientes` int(2) DEFAULT NULL,
  `eliminar_clientes` int(2) DEFAULT NULL,
  `suplidores` int(2) DEFAULT NULL,
  `agregar_suplidores` int(2) DEFAULT NULL,
  `ver_suplidores` int(2) DEFAULT NULL,
  `modificar_suplidores` int(2) DEFAULT NULL,
  `eliminar_suplidores` int(2) DEFAULT NULL,
  `ventas` int(2) DEFAULT NULL,
  `agregar_ventas` int(2) DEFAULT NULL,
  `editar_ventas` int(2) DEFAULT NULL,
  `ver_ventas` int(2) DEFAULT NULL,
  `Eliminar_ventas` int(2) DEFAULT NULL,
  `venta_a_credito` int(2) DEFAULT NULL,
  `venta_en_espera` int(2) DEFAULT NULL,
  `compras` int(2) DEFAULT NULL,
  `agregar_compra` int(2) DEFAULT NULL,
  `ver_compras` int(2) DEFAULT NULL,
  `modificar_compra` int(2) DEFAULT NULL,
  `compra_a_credito` int(2) DEFAULT NULL,
  `eliminar_compra` int(2) DEFAULT NULL,
  `cxc` int(2) DEFAULT NULL,
  `agregar_cxc` int(2) DEFAULT NULL,
  `ver_cxc` int(2) DEFAULT NULL,
  `modificar_cxc` int(2) DEFAULT NULL,
  `eliminar_cxc` int(2) DEFAULT NULL,
  `cxp` int(2) DEFAULT NULL,
  `agregar_cxp` int(2) DEFAULT NULL,
  `editar_cxp` int(2) DEFAULT NULL,
  `ver_cxp` int(2) DEFAULT NULL,
  `eliminar_cxp` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ");

      $tabla_roles = $conexion->query("
      CREATE TABLE `roles` (
        `id_rol` int(11) NOT NULL,
        `nombre_rol` varchar(100) NOT NULL,
        `descripcion_rol` varchar(100) DEFAULT NULL,
        `creado_por` varchar(100) DEFAULT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      
      
      ");

      
  header("location:../views/creador_u.php?empresa=$nombre_sin_espacio");
/*
      }
      else
      {
        echo ("Empresa ya existe");
      }*/
?>