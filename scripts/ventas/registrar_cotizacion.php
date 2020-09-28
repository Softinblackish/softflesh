<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cliente = $_POST["client"];
    $condicion = $_POST["condicion"];
    $forma = $_POST["forma"];
    $itebis = $_POST['itbis'];
    $precio = $_POST["precio"];
    $total = $_POST["total"];
    $id_temp = $_POST["id_temp"];

        $insertar_venta = $conexion->query("INSERT INTO $empresa.tbl_ventas (id_venta_temp, id_cliente, condicion_pago, tipo_comprobante, comprobante, forma_pago, itbis, precio, total, creado_por) 
        values($id_temp, $cliente,'$condicion', '$comprobante','$ncf', '$forma', $itebis, $precio, $total, '$usuario')");
            
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
        header("location: ../../views/venta/factura_venta.php?id_venta=$id ");
       
    
    
?>