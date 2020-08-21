<?php
    include("conexion/cone.php");
    $db_empresa= $_POST['nombre'];
    
    $crear_db = $conexion->query("CREATE DATABASE IF NOT EXISTS $db_empresa");
    $crear_tables = $conexion->query("
    CREATE TABLE $db_empresa.tbl_articulos (
        `id_articulo` int(11) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `descripcion` varchar(200) NOT NULL,
        `codigo` varchar(100) NOT NULL,
        `referencia` varchar(150) NOT NULL,
        `codigo_barra` varchar(200) NOT NULL,
        `categoria` varchar(50) NOT NULL,
        `almacen` varchar(50) NOT NULL,
        `status` varchar(20) NOT NULL,
        `creado_por` varchar(100) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `cantidad_actual` int(6) NOT NULL,
        `cantidad_disponible` int(6) NOT NULL,
        `fecha_modificacion` varchar(100) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

    $crear_tables = $conexion->query("
      CREATE TABLE $db_empresa.tbl_cod_impuestos (
        `id_cod_impuesto` int(11) NOT NULL,
        `nom_codigo` varchar(100) NOT NULL,
        `porciento` int(3) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      $crear_tables = $conexion->query("
      
      CREATE TABLE $db_empresa.tbl_compras (
        `id_compra` int(11) NOT NULL,
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
        `valor_total` int(11) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      $crear_tables = $conexion->query("
      CREATE TABLE $db_empresa.tbl_det_compras (
        `id_det_compra` int(11) NOT NULL,
        `id_compra` int(11) NOT NULL,
        `cod_articulo` varchar(50) NOT NULL,
        `nom_articulo` varchar(100) NOT NULL,
        `cantidad` float NOT NULL,
        `itbis` float NOT NULL,
        `valor` float NOT NULL,
        `total` float NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      $crear_tables = $conexion->query("
      CREATE TABLE $db_empresa.tbl_tmp_compras (
        `id` int(10) NOT NULL,
        `tmp_id_compra` int(100) NOT NULL,
        `cod_articulo` varchar(50) NOT NULL,
        `articulo` varchar(200) NOT NULL,
        `cantidad` int(6) NOT NULL,
        `itbis` float NOT NULL,
        `valor` float NOT NULL,
        `total` float NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
      
      $crear_tables = $conexion->query("
      CREATE TABLE $db_empresa.tbl_usuario (
        `id_usuario` int(11) NOT NULL,
        `nombre_usuario` varchar(100) NOT NULL,
        `contraseña_usuario` varchar(100) NOT NULL,
        `rol_usuario` varchar(100) NOT NULL,
        `status` varchar(100) NOT NULL,
        `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
    header("location:../views/creador_u.html");
    

?>