<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cliente = $_POST["client"];
    $condicion = $_POST["condicion"];
    $comprobante = $_POST["tipo_comprobante"];
    $forma = $_POST["forma"];
    $itebis = $_POST['itbis'];
    $precio = $_POST["precio"];
    $total = $_POST["total"];
    $id_temp = $_POST["id_temp"];
    $asiento = $_POST["asiento"];
 
        $consulta_comprobante = $conexion->query("SELECT * FROM $empresa.tbl_comprobantes where tipo = '$comprobante'");
        $registro_comprobante = $consulta_comprobante->fetch_assoc();
        
        $proximo = $registro_comprobante["proximo"]+1;
        $numero_ncf=$registro_comprobante["proximo"];
        $ultimo = $registro_comprobante["maximo"];
        $alerta = $registro_comprobante["cantidad_alerta"];
        $cantidad_alerta = $alerta + $proximo;
        $prefijo = "B00";
        if($comprobante =="Valor fiscal")
        {
            $prefijo="B01";
        }
        elseif($comprobante =="Consumidor final")
        {
            $prefijo="B02";
        }

        $ceros = "0";
        $tamano_ncf = strlen($numero_ncf);
        if($tamano_ncf == 1)
        {
            $ceros ="0000000";
        }
        if($tamano_ncf == 2)
        {
            $ceros ="000000";
        }
        if($tamano_ncf == 3)
        {
            $ceros ="00000";
        }
        if($tamano_ncf == 4)
        {
            $ceros ="0000";
        }
        if($tamano_ncf == 5)
        {
            $ceros ="000";
        }
        if($tamano_ncf == 6)
        {
            $ceros ="00";
        }
        if($tamano_ncf == 7)
        {
            $ceros ="0";
        }
        $ncf = $prefijo.$ceros.$numero_ncf;
        $caja = $_SESSION["caja"];
            
            $insertar_venta = $conexion->query("INSERT INTO $empresa.tbl_ventas (id_venta_temp, id_cliente, condicion_pago, tipo_comprobante, comprobante, forma_pago, itbis, precio, total, caja , creado_por) 
            values($id_temp, $cliente,'$condicion', '$comprobante','$ncf', '$forma', $itebis, $precio, $total, '$caja', '$usuario')");
        
            $actualizar_comprobante = $conexion->query("UPDATE $empresa.tbl_comprobantes SET proximo= $proximo WHERE tipo='$comprobante'");
            
            $consulta_factura = $conexion->query("SELECT id_venta FROM $empresa.tbl_ventas ORDER BY id_venta desc limit 1");
            $registro_factura = $consulta_factura->fetch_assoc();
            $id= $registro_factura["id_venta"];
        
            $consulta_venta_tem = $conexion->query("SELECT * FROM $empresa.tbl_venta_temp where id_venta = $id_temp");
        
            while($registros_venta_temp = $consulta_venta_tem->fetch_assoc())
            {
                $id_new = $registros_venta_temp["id_articulo"];//Capturo el id del articulo de la temp
                $consulta_articulos= $conexion->query("SELECT cantidad_disponible FROM $empresa.tbl_articulos WHERE id_articulo = $id_new");   //creo una consulta en la tabla articulo donde el id del articulo sea igual al id capturado de temp
                $registros_articulos= $consulta_articulos->fetch_assoc();
                $cantidad_actualizada = $registros_articulos["cantidad_disponible"] - $registros_venta_temp["cantidad"]; //creo una variable que calcule una resta cantidad_disponible - cantidad temp
                $actualizar_articulo = $conexion->query("UPDATE $empresa.tbl_articulos SET cantidad_disponible = $cantidad_actualizada WHERE id_articulo = $id_new");
            }

            $eliminar_cotizacion = $conexion->query("DELETE FROM $empresa.tbl_cotizaciones where id_venta_temp = $id_temp");
            $update_venta = $conexion->query("UPDATE $empresa.tbl_venta_temp SET en_espera = 0  WHERE id_venta = $id_temp");
            
            $identificativo_asiento = $conexion->query("SELECT * FROM $empresa.tbl_asientos WHERE area = 'ventas' AND identificativo = '$asiento'");
            $vinculador = rand(1,999999999);
            while ($filas = $identificativo_asiento->fetch_assoc()) {
                
                if($filas['debito'] == 1)
                {
                   $cuenta = $filas['cuenta'];
                   if($filas['campo_vinculado'] == 'Pago total')
                   {
                    $valor = $total;
                   }
                   if($filas['campo_vinculado'] == 'Pago Itbis')
                   {
                    $valor = $itebis;
                   } 
                   if($filas['campo_vinculado'] == 'Pago valor sin Itbis')
                   {
                    $valor = $itebis;
                   } 
                   if($filas['campo_vinculado'] == 'Cantidad a credito')
                   {
                    $valor = $itebis;
                    } 
                    if($filas['campo_vinculado'] == 'Pago adelantado')
                    {
                     $valor = $itebis;
                     } 
                    $insertar_transaccion = $conexion->query("INSERT INTO $empresa.transacciones_contables (origen, identificador, cantidad_desde_origen, creado_por) VALUES ($cuenta, '$vinculador', $valor, '$usuario')");
                    $consulta_cuentas_principales =$conexion->query("SELECT * from $empresa.tbl_cuentas_contables where numero_cuenta = '$cuenta'");
                    $existencia = $consulta_cuentas_principales->num_rows;
                    if($existencia > 0){
                        echo $cuenta ."  esto es una cuenta principal";
                    }
                    else{
                            echo "No hay cuenta principal";
                    }
                    $consulta_sub_cuentas =$conexion->query("SELECT * from $empresa.tbl_sub_cuentas where numero_cuenta = '$cuenta'");
                    $existencia = $consulta_sub_cuentas->num_rows;
                    if($existencia > 0){
                        echo $cuenta ."  esto es una cuenta secundaria";
                    }
                    else{
                            echo "No hay cuenta principal";
                    }

                    
                }
                if($filas['credito'] == 1)
                {
                    $cuenta = $filas['cuenta'];
                    if($filas['campo_vinculado'] == 'Pago total')
                    {
                     $valor = $total;
                    }
                    if($filas['campo_vinculado'] == 'Pago Itbis')
                    {
                     $valor = $itebis;
                    } 
                    if($filas['campo_vinculado'] == 'Pago valor sin Itbis')
                    {
                     $valor = $itebis;
                    } 
                    if($filas['campo_vinculado'] == 'Cantidad a credito')
                    {
                     $valor = $itebis;
                     } 
                     if($filas['campo_vinculado'] == 'Pago adelantado')
                     {
                      $valor = $itebis;
                      } 
                     $actualizar_cuenta = $conexion->query("UPDATE $empresa.tbl");
                     $insertar_transaccion = $conexion->query("INSERT INTO $empresa.transacciones_contables (destino, identificador, cantidad_hacia_destino, creado_por) VALUES ($cuenta, '$vinculador', $valor, '$usuario')");
                 echo $cuenta;
                   // $completar_transaccion_actual = $conexion->query("UPDATE $empresa.transacciones_contables SET destino = $cuenta, cantidad_hacia_destino = $valor WHERE identificador = '$vinculador'");
                }

                
            }

            //header("location: ../../views/venta/factura_venta.php?id_venta=$id ");
       
    
    
?>