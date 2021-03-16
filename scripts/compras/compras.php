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
    $periodo= $_POST['periodo'];
    

    //Datos de los articulos 
    $articulo= $_POST['articulo'];
    $precio_compra= $_POST['precio_compra'];
    $cantidad= $_POST['cantidad'];
    $stock= $_POST['stock'];
    $total= $_POST['total'];
    $valor_total= empty($_POST['valor_total']) ? 0 : $_POST['valor_total'];
    $caducidad = empty($_POST['caducidad']) ? '0000-00-00' : $_POST['caducidad']; 
    $nota= $_POST['nota'];
    $itbis= $_POST['impuestodf'];

    
        $consulta_det_compras = $conexion->query("SELECT no_compra FROM $empresa.tbl_compras where no_compra = $no_compra ");
        $registro_det_compras = $consulta_det_compras->fetch_assoc();
        if($consulta_det_compras->num_rows >= 1 ){
            
        }else{
            
            $Reg_det_compras = $conexion->query("insert into $empresa.tbl_compras (no_compra, nombre_proveedor, cod_proveedor, forma_pago , moneda,  entregar_a, valor_total , comprobante,cod_impuesto,condicion_pago,valor_impuestos,sin_impuestos,periodo) values ($no_compra, '$nombre_proveedor',$cod_proveedor,'$forma_pago' , '$moneda', '$entregar_a', $valor_total,null,null,null,0,0,'$periodo') ");
            
            //echo $empresa . "   " .$no_compra."   ".$nombre_proveedor."   ".$valor_total."   ".$forma_pago."   ".$moneda."   ".$entregar_a." ".null." ".null." ".null." "."0"." "."0";
            
            $Reg_new_id_compra = $conexion->query("insert into $empresa.tbl_compra_id_temp (no_compra) values ($no_compra);");
        }



        

        //Registro de detalle de articulos de la compra
        
        $procesoNoRepet = $conexion->query("SELECT articulo FROM $empresa.tbl_art_compras where articulo = '$articulo' and no_compra = $no_compra ");
        $comprobacionNoRepet = $procesoNoRepet->fetch_assoc();
        if($procesoNoRepet->num_rows >= 1 ){
                //selecion de la cantidad anterior
                $cantidad_anterior = $conexion->query("SELECT cantidad FROM $empresa.tbl_art_compras where articulo = '$articulo' and no_compra = $no_compra");
                $comprobacion_Cant_existente = $cantidad_anterior->fetch_assoc();
                $cantidadRegistro = $cantidad_anterior->num_rows;
                if($cantidadRegistro >=1 ){
                    $cantidad_art_existente = $comprobacion_Cant_existente["cantidad"];
                    //Comparacion de las cantidades
                    //echo $articulo." ".$cantidad." ".$comprobacion_Cant_existente["cantidad"];
                    if($cantidad > $cantidad_art_existente){
                        $cant_a_actualizar = $cantidad - $cantidad_art_existente;//5
                        ActualizarCantidades($cant_a_actualizar,$articulo); 
                    }elseif($cantidad < $cantidad_art_existente){
                        $cant_a_actualizar = $cantidad_art_existente - $cantidad;
                        ActualizarCantidades_negativo($cant_a_actualizar,$articulo); 
                    }else{

                    }
                    
                }else{
                    
                }

                $Update_art_compras = $conexion->query("UPDATE $empresa.tbl_art_compras set precio_compra = $precio_compra,cantidad=$cantidad,itbis = $itbis ,total = $total WHERE articulo = '$articulo' and no_compra = $no_compra"); 
                
        }else{
            $Reg_art_compras = $conexion->query("insert into $empresa.tbl_art_compras (no_compra, articulo, precio_compra, cantidad,itbis, total, stock, caducidad, nota)
            values ($no_compra, '$articulo',  $precio_compra, $cantidad,$itbis, $total ,$stock, '$caducidad', '$nota')
            "); 
            ActualizarCantidades($cantidad,$articulo);
        }

        

        





        //modificar las cantidades en positivo
        function ActualizarCantidades($var_cantidad,$articulo)
        {
            include("../conexion/cone.php");
            $empresa= $_SESSION["empresa_db"];
            echo $var_cantidad." ".$articulo;
            try {
                //code...
            
                    $consulta_cantidad = $conexion->query("SELECT cantidad_actual FROM $empresa.tbl_articulos where nombre = '$articulo' ");
                    $registro_cantidad = $consulta_cantidad->fetch_assoc();
                    if($consulta_cantidad->num_rows >= 1 ){
                        $cantidad_art_actual = $registro_cantidad["cantidad_actual"];
                        $cantidad_art_Nueva = $cantidad_art_actual + $var_cantidad;
                        $Aumentar_cantidad_articulos = $conexion->query("UPDATE $empresa.tbl_articulos set cantidad_actual = $cantidad_art_Nueva WHERE nombre = '$articulo'");
                    }else{
                        //$Reg_New_artCantidad = $conexion->query("insert into $empresa.tbl_articulos (cantidad_actual) values ($var_cantidad)");
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
        };

        //modificar las cantidades en negativo

        function ActualizarCantidades_negativo($var_cantidad,$articulo)
        {
            include("../conexion/cone.php");
            $empresa= $_SESSION["empresa_db"];
            try {
                //code...
                    echo $var_cantidad;
                    $consulta_cantidad = $conexion->query("SELECT cantidad_actual FROM $empresa.tbl_articulos where nombre = '$articulo' ");
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



        $Act_Valor_Total = $conexion->query("UPDATE $empresa.tbl_compras set valor_total = $valor_total where no_compra = $no_compra ");


    header('location:../../views/compras/frm_compras.php?registro="si" ')
?>