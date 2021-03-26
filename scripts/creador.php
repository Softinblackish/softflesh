<?php
    include("conexion/cone.php");
    $db_empresa= $_POST['nombre'];
    $direccion= $_POST['direccion'];
    $telefono= $_POST['telefono'];
    $rnc= $_POST['rnc'];
    $correo= $_POST['correo'];
    $encargado= $_POST['encargado'];
    $tel_encargado= $_POST['tel_encargado'];

   

    $empresas_existentes= $conexion->query("SELECT nombre_empresa from empresas_suscritas.informacion_empresa where nombre_empresa = '$db_empresa'");
    $verificacion_empresas_existentes = $empresas_existentes->num_rows;
    echo $verificacion_empresas_existentes; 
    if($verificacion_empresas_existentes < 1)
    {

      $nombre_sin_espacio = str_replace(" ", "_", $db_empresa);
      $registrar_empresa = $conexion->query("INSERT INTO empresas_suscritas.informacion_empresa (nombre_empresa, direccion_empresa, telefono_empresa, rnc_empresa, correo_empresa, encargado, telefono_encargado) value ('$db_empresa','$direccion','$telefono', '$rnc', '$correo','$encargado', '$tel_encargado')");
      $crear_db = $conexion->query("CREATE DATABASE IF NOT EXISTS $nombre_sin_espacio");
      
      $tabla_articulo = $conexion->query("
        CREATE TABLE $nombre_sin_espacio.tbl_articulos (
        `id_articulo` int(11) NOT NULL AUTO_INCREMENT,
        `nombre` varchar(100),
        `precio` float,
        `precio_compra` DOUBLE,
        `precio_venta` DOUBLE,
        `descripcion` varchar(200),
        `cod_impuesto` varchar(100),
        `stop_min` int(10),
        `codigo_barra` varchar(200),
        `categoria` varchar(50),
        `almacen` varchar(50),
        `status` varchar(20),
        `creado_por` varchar(100),
        `fecha_creacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `cantidad_actual` int(6),
        `cantidad_disponible` int(6) default 0,
        `fecha_modificacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `unidad` varchar(100) default 0,
        `cod_suplidor` DOUBLE,
        PRIMARY KEY (`id_articulo`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_contabilidad = $conexion->query("
        CREATE TABLE $nombre_sin_espacio.tbl_contabilidad (
        `id_contabilidad` int(11) NOT NULL AUTO_INCREMENT,
        `tipo_id` int(11),
        `T_Bienes_servicios` varchar(100),
        `NCF` varchar(30),
        `NCF_docMod` varchar(30),
        `Fec_comprobante` varchar(30),
        `Fec_pago` varchar(30),
        `Monto_Facturado_Servicios` DOUBLE,
        `Monto_Facturado_Bienes` DOUBLE,
        `Total_Monto_facturado` DOUBLE,
        `Itebis_Facturado` DOUBLE default 0,
        `Itebis_Retenido` DOUBLE default 0,
        `Itebis_sub_a_proporcionalidad` DOUBLE default 0,
        `Itebis_llevado_al_costo` DOUBLE default 0,
        `Itebis_por_adelantar` DOUBLE default 0,
        `Itebis_percibido_compra` DOUBLE default 0,
        `Tipo_Retencion_ISR` DOUBLE default 0,
        `Monto_Retencion_Renta` DOUBLE default 0,
        `ISR_percibido_compra` DOUBLE default 0,
        `Impuesto_selectivo_consumo` DOUBLE default 0,
        `Monto_prima_legal` DOUBLE,
        `Forma_pago`varchar(30),
        `Estatus` varchar(30),
        PRIMARY KEY (`id_contabilidad`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

    $tabla_help_606 = $conexion->query("
    CREATE TABLE $nombre_sin_espacio.tbl_help_606 (
      `id_help_606` int(11) NOT NULL AUTO_INCREMENT ,
      `t_bienes_and_services` varchar(100),
      `periodo` varchar(200) ,
      PRIMARY KEY (`id_help_606`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    "); 

    $tabla_impuestos = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_cod_impuestos (
        `id_cod_impuesto` int(11) NOT NULL AUTO_INCREMENT ,
        `nom_codigo` varchar(100) NOT NULL,
        `descripcion` varchar(200) ,
        `porciento` int(3) NOT NULL,
        `creado_por` varchar(150) ,
        PRIMARY KEY (`id_cod_impuesto`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_cuentas_por_pagar = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_cuentas_por_pagar (
        `id_cxp` int(11) NOT NULL AUTO_INCREMENT ,
        `servicios` varchar(75) NULL,
        `inicial` DOUBLE,
        `saldo` DOUBLE,
        `cant_pagos` DOUBLE,
        `tipo_pago` varchar(50) NULL,
        `pago_mensual` DOUBLE,
        `pago_anual` DOUBLE,
        `interes` DOUBLE,
        `moras` DOUBLE,
        `estatus` varchar(50) NULL,
        `descripcion` varchar(200) ,
        PRIMARY KEY (`id_cxp`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_cajas = $conexion->query(" 
      CREATE TABLE $nombre_sin_espacio.tbl_cajas ( 
        `id_caja` INT NOT NULL AUTO_INCREMENT , 
        `caja_nombre` VARCHAR(100) NULL ,
        `apertura` int(10) NULL , 
        `caja_sucursal` VARCHAR(100) NULL ,
        `ip` VARCHAR(50) NULL , 
        PRIMARY KEY (`id_caja`)) ENGINE = InnoDB;
        ");

        $tabla_sucursales = $conexion->query(" 
        CREATE TABLE $nombre_sin_espacio.tbl_sucursal ( 
          `id_sucursal` INT NOT NULL AUTO_INCREMENT , 
          `sucursal_nombre` VARCHAR(200) NULL , 
          `sucursal_direccion` VARCHAR(300) NULL , 
          `sucursal_encargado` VARCHAR(100) NULL , 
          `sucursal_telefono` VARCHAR(100) NULL , 
          PRIMARY KEY (`id_sucursal`)) ENGINE = InnoDB;
        ");
//tabla tbl compras_id_temp      
      $tabla_compras_id_temp = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_compra_id_temp (
        `id_compra` int(11) NOT NULL AUTO_INCREMENT,
        `no_compra` DOUBLE,
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
//tabla tbl nomina_id_temp      
      $tabla_compras_id_temp = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_nomina_id_temp (
        `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
        `no_nomina` DOUBLE,
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
//tabla tbl compras
      $tabla_compra = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_compras (
        `id_compra` int(11) NOT NULL AUTO_INCREMENT,
        `nombre_proveedor` varchar(100),
        `cod_proveedor` varchar(100),
        `comprobante` varchar(50),
        `cod_impuesto` varchar(50),
        `forma_pago` varchar(50),
        `moneda` varchar(50),
        `entregar_a` varchar(200),
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `condicion_pago` varchar(100),
        `valor_impuestos` int(11),
        `sin_impuestos` int(11),
        `valor_total` DOUBLE,
        `no_compra` int(11),
        `periodo` varchar(30),
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      
//tabla tbl nomina
      $tabla_articulo = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_nomina (
      `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
      `empleado` varchar(100),
      `salario_base` Double,
      `salario_dia` DOUBLE,
      `salario_hora` DOUBLE,
      `hora_extra` DOUBLE,
      `departamento` varchar(100),
      `puesto` varchar(100),
      `dias_laborables` varchar(100),
      `turno` varchar(50),
      `pension` DOUBLE,
      `salud` DOUBLE,
      `ars` varchar(100),
      `vacaciones` DOUBLE,
      `cesantia` DOUBLE,
      `sueldo` DOUBLE,
      `no_nomina` int(11),
      `horas_trabajadas` int(11),
      `cedula` varchar(18),
      `estado` varchar(50),
      `fecha_creacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      PRIMARY KEY (`id_nomina`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");

//tabla tbl compras articulos
      $tabla_art_compra = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_art_compras (
        `id_compra` int NOT NULL AUTO_INCREMENT,
        `no_compra` int(11),
        `articulo` varchar(100),
        `precio_compra` DOUBLE,
        `cantidad` int(11),
        `stock` int(11),
        `itbis` DOUBLE,
        `total` DOUBLE,
        `caducidad` date DEFAULT '0000-00-00',
        `nota` varchar(100),
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_impuestos = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_devoluciones_compra (
        `id` int(11) NOT NULL AUTO_INCREMENT ,
        `articulo` varchar(100) NOT NULL,
        `precio` DOUBLE,
        `cantidad` DOUBLE,
        `total` DOUBLE,
        `cantidad_devuelta` DOUBLE,
        `new_total` DOUBLE,
        `creado_por` varchar(150),
        `caducidad` date DEFAULT '0000-00-00',
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $tabla_tmp_compra= $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_suplidores (
        `id_sup` int(10) NOT NULL AUTO_INCREMENT,
        `nombre_sup` varchar(100),
        `codigo_sup` varchar(50),
        `contacto_sup` varchar(100), 
        `sector_sup` varchar(100),
        `ciudad_sup` varchar(100), 
        `tel_no1_sup` varchar(15), 
        `tel_no2_sup` varchar(15), 
        `tel_no3_sup` varchar(15),
        `rnc_sup` varchar(50), 
        `nota_sup` varchar(100),
        PRIMARY KEY (`id_sup`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      $tabla_usuario = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_usuario ( 
        `id_usuario` INT NOT NULL AUTO_INCREMENT , 
        `nombre_usuario` VARCHAR(200) NOT NULL , 
        `contrasena_usuario` VARCHAR(100) NOT NULL , 
        `rol_usuario` VARCHAR(200) NOT NULL , 
        `status` VARCHAR(100) NOT NULL DEFAULT 'Activo' , 
        `fecha_creacion` TIMESTAMP NOT NULL , 
        `nombre` VARCHAR(200) NULL , 
        `cedula_usuario` VARCHAR(50) NULL , 
        `sucursal_usuario` VARCHAR(100) NULL , 
        `ultimo_acceso` TIMESTAMP NULL , 
        `horario` VARCHAR(100) NULL , 
        PRIMARY KEY (`id_usuario`)) ENGINE = InnoDB;

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

      $tabla_roles = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_cierre_caja ( 
      `id_cierre` INT NOT NULL AUTO_INCREMENT , 
      `sucursal` VARCHAR(200) NULL , 
      `caja` VARCHAR(100) NULL , 
      `diferencia` INT(10) NULL , 
      `vendido` INT(10) NULL , 
      `total` INT(10) NULL ,
      `total_caja` INT(10) NULL , 
      `apertura` INT(10) NULL , 
      `creado_por` VARCHAR(200) NOT NULL , 
      `fecha_creacion` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      PRIMARY KEY (`id_cierre`)) ENGINE = InnoDB;");

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
        `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
        `nombre_categoria` varchar(200) NOT NULL,
        `descripcion_categoria` varchar(100),
        `creada_por` varchar(200) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id_categoria`)) ENGINE = InnoDB;
      ");

      $tabla_categoria = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_condiciones_pago ( 
        `id_condicion_p` INT NOT NULL AUTO_INCREMENT , 
        `nombre_condicion_p` VARCHAR(100) NOT NULL , 
        `dias_condicion_p` VARCHAR(10) NOT NULL , 
        `descripcion_condicion_p` VARCHAR(200) NULL , 
        `creado_por` VARCHAR(150) NOT NULL , 
        `fecha_creacion`
         TIMESTAMP NOT NULL , PRIMARY KEY (`id_condicion_p`)) ENGINE = InnoDB;
      ");
      
      $tabla_categoria = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_clientes (
         `id_cliente` INT NOT NULL AUTO_INCREMENT , 
         `codigo_cliente` VARCHAR(200), 
         `nombre_cliente` VARCHAR(100) NOT NULL , 
         `Pais` VARCHAR(200) , 
         `provincia` VARCHAR(100) , 
         `direccion` VARCHAR(100) , 
         `correo` VARCHAR(100) , 
         `tipo_identificacion` INT(1) , 
         `telefono_cliente` VARCHAR(100) , 
         `tipo_cliente` VARCHAR(100) , 
         `referencia` VARCHAR(100) , 
         `rnc_cliente` VARCHAR(100) , 
         `creado_por` VARCHAR(100)  , 
         `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
         `fecha_modificacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP , 
         `modificado_por` VARCHAR(100) , 
         `limite_credito` INT(10) , 
         `condicion_pago` VARCHAR(100) , 
         `status` VARCHAR(10), PRIMARY KEY (`id_cliente`)) ENGINE = InnoDB;
      ");

      $tabla_venta_temp = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_venta_temp ( 
      `id_venta_temp` INT NOT NULL AUTO_INCREMENT , 
      `id_venta` INT(10) NOT NULL , 
      `id_articulo` INT(10) NOT NULL , 
      `articulo` VARCHAR(150) NOT NULL , 
      `itbis` INT(10) NOT NULL ,
      `cotizacion` INT(1) NOT NULL DEFAULT '0',
      `precio` INT(10) NOT NULL , 
      `total` INT(10) NOT NULL , 
      `creado_por` VARCHAR(100) NOT NULL ,
      `en_espera` INT(1) NOT NULL DEFAULT '0',
      `cantidad` INT(10) NOT NULL , 
      `fecha_creacion` TIMESTAMP NOT NULL ,
      PRIMARY KEY (`id_venta_temp`)) ENGINE = InnoDB;
      ");

      #$tabla_venta_temp = $conexion->query("ALTER TABLE `tbl_venta_temp` ADD `en_espera` INT(1) NOT NULL DEFAULT '0' AFTER `id_venta`;");

      $tabla_venta = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_ventas ( 
      `id_venta` INT NOT NULL AUTO_INCREMENT , 
      `id_venta_temp` INT(10) NOT NULL , 
      `id_cliente` INT(10) NOT NULL , 
      `tipo_comprobante` VARCHAR(150) NOT NULL , 
      `condicion_pago` VARCHAR(150) NOT NULL , 
      `devolucion` int(1) NOT NULL DEFAULT '0' , 
      `forma_pago` VARCHAR(50) NOT NULL , 
      `itbis` INT(10) NOT NULL , 
      `precio` INT(10) NOT NULL , 
      `total` INT(10) NOT NULL , 
      `comprobante` VARCHAR(100) NOT NULL , 
      `caja` VARCHAR(50) NOT NULL , 
      `creado_por` VARCHAR(150) NOT NULL , 
      `fecha_creacion` TIMESTAMP NOT NULL , 
      `modificado_por` VARCHAR(150) NULL , 
      `fecha_modificacion` DATE NULL , 
      PRIMARY KEY (`id_venta`)) ENGINE = InnoDB;

      ");

      
      $tabla_comprobantes = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_comprobantes (
        `id_comprobante` int(11) NOT NULL AUTO_INCREMENT,
        `tipo` varchar(100) NOT NULL,
        `proximo` int(11) NOT NULL,
        `maximo` int(11) NOT NULL,
        `cantidad_alerta` int(11) NOT NULL,
        `modificado por` varchar(200) NOT NULL,
        `fecha_modificado` timestamp NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id_comprobante`)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
      ");

      $tabla_cotizaciones = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_cotizaciones ( 
      `id_cotizacion` INT NOT NULL AUTO_INCREMENT , 
      `id_venta_temp` INT(10) NOT NULL , 
      `id_cliente` INT(10) NOT NULL , 
      `itbis` INT(10) NOT NULL , 
      `precio` INT(10) NOT NULL , 
      `total` INT(10) NOT NULL , 
      `creado_por` VARCHAR(50) NOT NULL , 
      `fecha_creacion` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      `modificado_por` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , 
      PRIMARY KEY (`id_cotizacion`)) ENGINE = InnoDB;
      ");

      $tabla_devoluciones = $conexion->query("
      CREATE TABLE $nombre_sin_espacio.tbl_devoluciones ( 
        `id_devolucion_temp` INT NOT NULL AUTO_INCREMENT , 
        `id_venta_temp` INT(10) NULL , 
        `comprobante` VARCHAR(50) NULL , 
        `creado_por` VARCHAR(100) NULL , 
        `fecha_creacion` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , 
        PRIMARY KEY (`id_devolucion_temp`)) ENGINE = InnoDB;
        ");

        $tabla_devoluciones = $conexion->query("
        CREATE TABLE $nombre_sin_espacio.tbl_devoluciones_det ( 
        `id_devoluciones_det` INT NOT NULL AUTO_INCREMENT , 
        `id_articulo` INT(10) NULL ,
        `cantidad` INT(10) NULL , 
        `id_venta_temp` INT(10) NULL , 
        PRIMARY KEY (`id_devoluciones_det`)) ENGINE = InnoDB;
          ");

        $tabla_art_compra_temp = $conexion->query("
        CREATE TABLE $nombre_sin_espacio.tbl_art_compras (
          `id_compra` INT NOT NULL AUTO_INCREMENT,
          `no_compra` INT(11) NULL,
          `articulo` varchar(100) NULL,
          `precio_compra` INT(10) NULL,
          `cantidad` INT(11) NULL,
          `stock` INT(11) NULL,
          `total` INT(11) NULL,
          `caducidad`  DATE NULL,
          `nota` varchar(100) NULL,
          `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
          PRIMARY KEY (`id_compra`)) ENGINE=InnoDB ;
          ");


          $tabla_nota_credito = $conexion->query("
          CREATE TABLE $nombre_sin_espacio.tbl_nota_credito ( 
            `id_nota_credito` INT NOT NULL AUTO_INCREMENT , 
            `comprobante_factura` VARCHAR(50) NOT NULL , 
            `comprobante` VARCHAR(50) NOT NULL , 
            `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
            `creado_por` VARCHAR(100) NOT NULL , 
            `total` INT(10)  NULL , 
            `id_articulos_lista` INT(10) NOT NULL ,  
            `descripcion` VARCHAR(300) , 
            PRIMARY KEY (`id_nota_credito`)) ENGINE = InnoDB;
            ");

            $tabla_pase_inventario = $conexion->query("
            CREATE TABLE  $nombre_sin_espacio.tbl_pase_inventario ( 
              `id_pase_inventario` INT NOT NULL AUTO_INCREMENT , 
              `fecha_creacion` TIMESTAMP NOT NULL , 
              `creado_por` VARCHAR(50) NULL , 
              `irregularidades` INT(10) NULL DEFAULT '0' ,
             PRIMARY KEY (`id_pase_inventario`)) ENGINE = InnoDB;
             ");
             $tabla_cuentas_c = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.tbl_cuentas_c
               ( `id_cuenta_c` INT NOT NULL AUTO_INCREMENT , 
               `id_venta` INT(50) NULL , 
               `valor` INT(50) NULL , 
               `id_condicion` INT(50) NULL , 
               `fecha_creacion` TIMESTAMP NULL , 
               `id_cliente` INT(10) NULL , 
               `origen` VARCHAR(100) NULL , 
               `fecha_a_cobrar` DATE NULL , 
               PRIMARY KEY (`id_cuenta_c`)) ENGINE = InnoDB;
              ");

             $tabla_pase_inventario_det = $conexion->query("
             CREATE TABLE $nombre_sin_espacio.tbl_pase_inventario_det ( 
               `id_pase_inventario_det` INT NOT NULL AUTO_INCREMENT , 
               `id_articulo` INT NOT NULL , 
               `cantidad_fisica` INT NOT NULL , 
               `diferencia` INT NOT NULL , 
               `categoria` INT NOT NULL , 
               `id_identificador` INT(15) NOT NULL ,
               `cantidad_en_sistema` INT NOT NULL ) ENGINE = InnoDB;
               ");

               $tabla_cuentas_contables = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.tbl_cuentas_contables ( 
                 `id_cuenta` INT NOT NULL AUTO_INCREMENT , 
                 `numero_cuenta` VARCHAR(20) NOT NULL , 
                 `nombre_cuenta` VARCHAR(200) NOT NULL , 
                 `valor_inicial` INT(10) NOT NULL , 
                 `valor_actual` INT(10) NOT NULL , 
                 `tipo` VARCHAR(100) NOT NULL , 
                 `creado_por` VARCHAR(200) NULL ,
                 `fecha_creacion` TIMESTAMP NOT NULL , 
                 PRIMARY KEY (`id_cuenta`)) ENGINE = InnoDB;
               ");
               $tabla_sub_cuentas = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.tbl_sub_cuentas ( 
                 `id_cuenta` INT NOT NULL AUTO_INCREMENT , 
                 `numero_cuenta` VARCHAR(10) NULL , 
                 `nombre_cuenta` VARCHAR(200) NULL ,
                 `valor_inicial` INT(10) NULL , 
                 `valor_actual` INT(10) NULL ,
                 `cuenta_madre` VARCHAR(100) NULL , 
                 `tipo` VARCHAR(100) NULL , 
                 `creado_por` VARCHAR(200) NULL ,
                 `fecha_creacion` TIMESTAMP NOT NULL , 
                 PRIMARY KEY (`id_cuenta`)) ENGINE = InnoDB;
               ");
               $tabla_cuentas_detalles = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.tbl_cuentas_detalles ( 
                 `id_cuenta` INT NOT NULL AUTO_INCREMENT , 
                 `numero_cuenta` VARCHAR(10) NULL , 
                 `nombre_cuenta` VARCHAR(200) NULL ,
                 `valor_inicial` INT(10) NULL , 
                 `valor_actual` INT(10) NULL ,
                 `cuenta_madre` VARCHAR(100) NULL , 
                 `sub_cuenta` VARCHAR(100) NULL , 
                 `tipo` VARCHAR(100) NULL , 
                 `creado_por` VARCHAR(200) NULL ,
                 `fecha_creacion` TIMESTAMP NOT NULL , 
                 PRIMARY KEY (`id_cuenta`)) ENGINE = InnoDB;
               ");
               $tabla_asientos = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.tbl_asientos ( 
                 `id_asiento` INT NOT NULL AUTO_INCREMENT , 
                 `cuenta` VARCHAR(200) NOT NULL ,
                 `area` VARCHAR(200) NOT NULL ,
                 `identificativo` VARCHAR(200) NOT NULL , 
                 `predeterminado` INT(2) NOT NULL DEFAULT '0'
                 `debito_porciento` INT(10) NOT NULL DEFAULT '0' , 
                 `credito_porciento` INT(10) NOT NULL DEFAULT '0' ,
                 `campo_vinculado` VARCHAR(100) NULL ,
                 `id_temp` double NOT NULL , 
                 `creado_por` VARCHAR(100) NOT NULL , 
                 `fecha_creacion` TIMESTAMP NOT NULL , 
                 PRIMARY KEY (`id_asiento`)) ENGINE = InnoDB;
               ");
               $transacciones_contables = $conexion->query("
               CREATE TABLE $nombre_sin_espacio.transacciones_contables 
               ( `id_transacion` INT NOT NULL AUTO_INCREMENT , 
               `origen` VARCHAR(200) NOT NULL , 
               `destino` VARCHAR(200) NOT NULL , 
               `identificador` INT(10) NOT NULL , 
               `fecha_creacion` TIMESTAMP NOT NULL ,
                `creado_por` VARCHAR(12) NOT NULL , 
                `cantidad_desde_origen` DOUBLE NOT NULL ,
                 `cantidad_hacia_destino` DOUBLE NOT NULL , 
                 PRIMARY KEY (`id_transacion`)) ENGINE = InnoDB;
               ");
          header("location:../views/creador_u.php?empresa=$nombre_sin_espacio");
      }
      else
      {
        echo ("Empresa ya existe");
      }
?>