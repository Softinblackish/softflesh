<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la compra.
    $no_compra= $_POST['no_compra']; 
    $caducidad=$_POST["caducidad"]; 
    $hora=$_POST['hora'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $direccion_proveedor= $_POST['direccion_proveedor'];
    $tel_proveedor= $_POST['tel_proveedor'];
    $email_proveedor= $_POST['email_proveedor'];
    //Datos de los impuestos 
    $cod_impuesto= $_POST['cod_impuesto']; 
    $valor_impuesto= $_POST['valor_impuesto'];
    $sin_impuesto= $_POST['sin_impuesto'];
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

    
    //echo $empresa . " " .$no_compra." ".$caducidad." ".$hora." ".$nombre_proveedor." ".$direccion_proveedor." ".$tel_proveedor.  " ".$email_proveedor." ".$cod_impuesto." ".$valor_impuesto." ".$sin_impuesto." ".$articulo." ".$precio_compra." ".$cantidad." ".$valor_total." ".$nota." ".$forma_pago." ".$moneda." ".$stock." ".$comprobante." ".$entregar_a." ".$condicion_pago;
   
        $Reg_compras = $conexion->query("insert into $empresa.tbl_compras_temp (no_compra, caducidad, hora, nombre_proveedor, direccion_proveedor,  tel_proveedor,email_proveedor,articulo, precio_compra, cantidad, cod_impuesto, valor_impuesto, sin_impuesto, forma_pago , moneda, stock, comprobante, entregar_a, condicion_pago, valor_total, nota)
            values ($no_compra, '$caducidad', '$hora', '$nombre_proveedor', '$direccion_proveedor','$tel_proveedor', '$email_proveedor', '$articulo', $precio_compra, $cantidad, $cod_impuesto, $valor_impuesto $sin_impuesto ,    $forma_pago , $moneda, $stock, $comprobante, $entregar_a, $condicion_pago, $valor_total, '$nota')
            ");
    
//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>