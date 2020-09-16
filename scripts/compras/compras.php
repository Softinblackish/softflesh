<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la compra.
    $no_compra= $_POST['no_compra']; 
    $caducidad=$_POST["caducidad"]; 
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $cod_proveedor = $_POST['cod_proveedor'];
    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $valor_total= $_POST['valor_total'];
    $nota= $_POST['nota'];

    $forma_pago= $_POST['forma_pago']; 
    $moneda= $_POST['moneda'];
    $stock= $_POST['stock'];
    $comprobante= $_POST['comprobante']; 
    $entregar_a= $_POST['entregar_a'];
    $condicion_pago= $_POST['condicion_pago'];


     /*
     
         tbl_compras_temp (
        `id_compra` int(11) NOT NULL AUTO_INCREMENT,
        `nombre_proveedor` varchar(100),
        `comprobante` varchar(50),
        `cod_impuesto` varchar(50),
        `forma_pago` varchar(50),
        `moneda` varchar(50),
        `entregar_a` varchar(200),
        `nota` varchar(300),
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        `caducidad` date,
        `condicion_pago` varchar(100),
        `valor_impuestos` int(11),
        `sin_impuestos` int(11),
        `valor_total` DOUBLE,
        `no_compra` int(11),
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");

      tbl_art_compras_temp (
        `id_compra` int(11) NOT NULL AUTO_INCREMENT,
        `no_compra` int(11),
        `articulo` varchar(100),
        `precio_compra` DOUBLE,
        `cantidad` int(11),
        `stock` int(11),
        `fecha_orden` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
        PRIMARY KEY (`id_compra`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8
      ");
    */
    
    //echo $empresa . " " .$no_compra." ".$caducidad." ".$hora." ".$nombre_proveedor." ".$direccion_proveedor." ".$tel_proveedor.  " ".$email_proveedor." ".$articulo." ".$precio_compra." ".$cantidad." ".$valor_total." ".$nota;
   
        $Reg_compras = $conexion->query("insert into $empresa.tbl_compras (no_compra, caducidad, nombre_proveedor, forma_pago , moneda, stock, comprobante, entregar_a, condicion_pago, valor_total)
            values ($no_compra, '$caducidad', '$nombre_proveedor',$forma_pago , $moneda, $stock, $comprobante, $entregar_a, $condicion_pago, $valor_total)
            ");

        $Reg_compras = $conexion->query("insert into $empresa.tbl_art_compras (no_compra, articulo, precio_compra, cantidad, valor_total, nota)
            values ($no_compra, '$articulo',  $precio_compra, $cantidad, $valor_total, '$nota')
            ");    
    
//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>