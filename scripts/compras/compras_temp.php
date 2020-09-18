<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la compra.
    $no_compra= $_POST['no_compra']; 

    //Datos de la compra como tal.
    $forma_pago= $_POST['forma_pago']; 
    $moneda= $_POST['moneda'];
    $comprobante= $_POST['comprobante']; 
    $entregar_a= $_POST['entregar_a'];
    $condicion_pago= $_POST['condicion_pago'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $cod_proveedor = $_POST['cod_proveedor'];
    //Datos de los impuestos 
    $cod_impuesto= $_POST['cod_impuesto']; 
    $valor_impuesto= $_POST['valor_impuesto'];
    $sin_impuesto= $_POST['sin_impuesto'];
    
    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $stock= $_POST['stock'];
    $valor_total= $_POST['valor_total'];
    $caducidad=$_POST["caducidad"]; 
    $nota= $_POST['nota'];
 
    
    
    //echo $empresa . " " .$no_compra." ".$caducidad." ".$hora." ".$nombre_proveedor." ".$direccion_proveedor." ".$tel_proveedor.  " ".$email_proveedor." ".$cod_impuesto." ".$valor_impuesto." ".$sin_impuesto." ".$articulo." ".$precio_compra." ".$cantidad." ".$valor_total." ".$nota." ".$forma_pago." ".$moneda." ".$stock." ".$comprobante." ".$entregar_a." ".$condicion_pago;
   
        

        $Reg_compras = $conexion->query("insert into $empresa.tbl_compras_temp (no_compra, nombre_proveedor, forma_pago , moneda,  comprobante, entregar_a, condicion_pago, valor_impuestos, sin_impuestos ,valor_total)
        values ($no_compra, '$nombre_proveedor',$forma_pago , $moneda, $comprobante, $entregar_a, $condicion_pago, $valor_impuestos, $sin_impuestos ,$valor_total)
        ");

        $Reg_compras = $conexion->query("insert into $empresa.tbl_art_compras_temp (no_compra, articulo, precio_compra, cantidad, stock, caducidad, nota)
        values ($no_compra, '$articulo',  $precio_compra, $cantidad, $stock, '$caducidad', '$nota')
        ");     
    
//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>