<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la compra.
    $no_compra= $_POST['no_compra'];

    //Datos de la compra como tal.
    $forma_pago= $_POST['forma_pago']; 
    $moneda= $_POST['moneda'];
    $entregar_a= $_POST['entregar_a'];
    //Datos de los proveedores 
    $nombre_proveedor= $_POST['nombre_proveedor']; 
    $cod_proveedor = $_POST['cod_proveedor'];
    

    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $stock= $_POST['stock'];
    $total= $_POST['total'];
    $valor_total= $_POST['valor_total'];
    $caducidad = empty($_POST['caducidad']) ? '0000-00-00' : $_POST['caducidad']; 
    $nota= $_POST['nota'];

    
        $consulta_det_compras = $conexion->query("SELECT no_compra FROM $empresa.tbl_compras where no_compra = $no_compra ");
        $registro_det_compras = $consulta_det_compras->fetch_assoc();
        if($consulta_det_compras->num_rows >= 1 ){
            
        }else{
            $Reg_det_compras = $conexion->query("insert into $empresa.tbl_compras (no_compra, nombre_proveedor, cod_proveedor, forma_pago , moneda,  entregar_a, valor_total)
            values ($no_compra, '$nombre_proveedor','$cod_proveedor',$forma_pago , '$moneda', '$entregar_a', $valor_total)
            ");
        }

        
        $Reg_art_compras = $conexion->query("insert into $empresa.tbl_art_compras (no_compra, articulo, precio_compra, cantidad, total, stock, caducidad, nota)
            values ($no_compra, '$articulo',  $precio_compra, $cantidad, $total ,$stock, '$caducidad', '$nota')
            ");    
    
            //echo $empresa . "  " .$no_compra." ".$forma_pago."  ".$moneda."  ".$entregar_a." ".$nombre_proveedor." ".$cod_proveedor." <br>";

            //echo $empresa . "  " .$no_compra."  ".$caducidad."  ".$articulo."  ".$precio_compra."  ".$cantidad."  ".$valor_total."  ".$nota."  ".$stock." ";
//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>