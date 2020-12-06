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
    $itbis= $_POST['impuestodf'];

    
        $consulta_det_compras = $conexion->query("SELECT no_compra FROM $empresa.tbl_compras where no_compra = $no_compra ");
        $registro_det_compras = $consulta_det_compras->fetch_assoc();
        if($consulta_det_compras->num_rows >= 1 ){
            
        }else{
            $Reg_det_compras = $conexion->query("insert into $empresa.tbl_compras (no_compra, nombre_proveedor, cod_proveedor, forma_pago , moneda,  entregar_a, valor_total)
            values ($no_compra, '$nombre_proveedor','$cod_proveedor',$forma_pago , '$moneda', '$entregar_a', $valor_total)
            ");
        }



        //modificar las cantidades en positivo
        $ActualizarCantidades = function($var_cantidad,$articulo)
        {
            include("../conexion/cone.php");
            $empresa= $_SESSION["empresa_db"];

            try {
                //code...
            
                    $consulta_cantidad = $conexion->query("SELECT cantidad_actual FROM $empresa.tbl_articulos where nombre = $articulo ");
                    $registro_cantidad = $consulta_cantidad->fetch_assoc();
                    if($consulta_cantidad->num_rows >= 1 ){
                        $cantidad_art_actual = $registro_cantidad["cantidad_actual"];
                        $cantidad_art_Nueva = $cantidad_art_actual + $var_cantidad;
                        $Aumentar_cantidad_articulos = $conexion->query("UPDATE $empresa.tbl_articulos set cantidad_actual = $cantidad_art_Nueva WHERE nombre = '$articulo'");
                    }else{
                        $Reg_New_artCantidad = $conexion->query("insert into $empresa.tbl_articulos (cantidad_actual) values ($var_cantidad)");
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
        };

        //modificar las cantidades en negativo

        $ActualizarCantidades_negativo = function($var_cantidad,$articulo)
        {
            include("../conexion/cone.php");
            $empresa= $_SESSION["empresa_db"];
            try {
                //code...
            
                    $consulta_cantidad = $conexion->query("SELECT cantidad_actual FROM $empresa.tbl_articulos where nombre = $articulo ");
                    $registro_cantidad = $consulta_cantidad->fetch_assoc();
                    if($consulta_cantidad->num_rows >= 1 ){
                        $cantidad_art_actual = $registro_cantidad["cantidad_actual"];
                        $cantidad_art_Nueva = $cantidad_art_actual - $var_cantidad;
                        $Aumentar_cantidad_articulos = $conexion->query("UPDATE $empresa.tbl_articulos set cantidad_actual = $cantidad_art_Nueva WHERE nombre = '$articulo'");
                    }else{
                        $Reg_New_artCantidad = $conexion->query("insert into $empresa.tbl_articulos (cantidad_actual) values ($var_cantidad)");
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
        };
        
        //aqui el fin del proceso

        //Registro de detalle de articulos de la compra
        $procesoNoRepet = $conexion->query("SELECT articulo FROM $empresa.tbl_art_compras where articulo = '$articulo' and no_compra = $no_compra ");
        $comprobacionNoRepet = $procesoNoRepet->fetch_assoc();
        if($procesoNoRepet->num_rows >= 1 ){
            $Update_art_compras = $conexion->query("UPDATE $empresa.tbl_art_compras set precio_compra = $precio_compra,cantidad=$cantidad,itbis = $itbis ,total = $total WHERE articulo = '$articulo' and no_compra = $no_compra"); 
                
                //selecion de la cantidad anterior
                $cantidad_anterior = $conexion->query("SELECT cantidad FROM $empresa.tbl_art_compras where articulo = '$articulo' and no_compra = $no_compra");
                $comprobacion_Cant_existente = $cantidad_anterior->fetch_assoc();
                if($cantidad_anterior->num_rows >= 1 ){
                    $cantidad_art_existente = $comprobacion_Cant_existente["cantidad"];
                    //Comparacion de las cantidades
                    if($cantidad > $cantidad_art_existente){
                        $cant_a_actualizar = $cantidad - $cantidad_art_existente;
                        $ActualizarCantidades($cant_a_actualizar,$articulo); 
                    }else if($cantidad < $cantidad_art_existente){
                        $cant_a_actualizar = $cantidad_art_existente - $cantidad;
                        $ActualizarCantidades_negativo($cant_a_actualizar,$articulo); 
                    }else{

                    }
                    
                }else{
                    
                }

        }else{
            $Reg_art_compras = $conexion->query("insert into $empresa.tbl_art_compras (no_compra, articulo, precio_compra, cantidad,itbis, total, stock, caducidad, nota)
            values ($no_compra, '$articulo',  $precio_compra, $cantidad,$itbis, $total ,$stock, '$caducidad', '$nota')
            "); 
            $ActualizarCantidades($cantidad);
        }

        

        
        /*$Reg_art_compras = $conexion->query("insert into $empresa.tbl_art_compras (no_compra, articulo, precio_compra, cantidad, total, stock, caducidad, nota)
            values ($no_compra, '$articulo',  $precio_compra, $cantidad, $total ,$stock, '$caducidad', '$nota')
            ");*/    
    
            //echo $empresa . "  " .$no_compra." ".$forma_pago."  ".$moneda."  ".$entregar_a." ".$nombre_proveedor." ".$cod_proveedor." <br>";

            //echo $empresa . "  " .$no_compra."  ".$caducidad."  ".$articulo."  ".$precio_compra."  ".$cantidad."  ".$valor_total."  ".$nota."  ".$stock." ";
        //echo $valor_total;
        $Act_Valor_Total = $conexion->query("UPDATE $empresa.tbl_compras set valor_total = $valor_total where no_compra = $no_compra ");

//cxcobrar y cxpagar
    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>