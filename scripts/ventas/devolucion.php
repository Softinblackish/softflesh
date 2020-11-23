<?php
    include("../conexion/cone.php");
    session_start();

    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION['user'];

    $conteo = 0;
    $id_venta = $_POST["venta_temp"];

    $id_random = random_int(1,9999999999);
    $consulta_devolucion_det = $conexion->query("SELECT * from $empresa.tbl_devoluciones_det WHERE id_random = $id_random");
    $resultado_devoluciones_det = $consulta_devolucion_det->num_rows;
    /*echo $id_random;
    if($resultado_devoluciones_det > 0)
    {
        $id_random = random_int(1,9999999999);
        echo $id_random;
    }
*/
    while ($conteo < 100) {
        if(isset($_POST["articulo_".$conteo]))
        {
            $cantidad = $_POST["".$conteo];
            $articulo = $_POST["articulo_".$conteo];
            echo $articulo;
            /*
            #consultas
            $consulta_venta_temp = $conexion->query("SELECT cantidad FROM $empresa.tbl_venta_temp where id_venta = $id_venta and id_articulo = $articulo ");
            $resultado_venta = $consulta_venta_temp->fetch_assoc();

            $consulta_venta = $conexion->query("SELECT comprobante, id_venta, id_clientes from $empresa.tbl_ventas where id_venta_temp = $id_venta");
            $resultado_factura= $consulta_venta->fetch_assoc();

            $consulta_articulo = $conexion->query("SELECT precio, cantidad_disponible, cod_impuesto from $empresa.tbl_articulos WHERE id_articulo = $articulo");
            $resultado_articulo = $consulta_articulo->fetch_assoc();

            $cod_impuesto = $resultado_articulo["cod_impuesto"];
            $consulta_cod_impuesto = $conexion->query("SELECT porciento FROM $empresa.tbl_cod_impuestos WHERE id_cod_impuesto = $cod_impuesto");
            $resultado_cod_impuesto = $consulta_cod_impuesto->fetch_assoc();

            #inserciones

            $comprobante = $resultado_factura["comprobante"];
            $insertar_devoluciones_det = $conexion->query("INSERT INTO $empresa.tbl_devoluciones_det (id_random, id_articulo, cantidad, valor_devuelto, id_venta_temp) values($id_random,'b040000001','$usuario', $factura,)");
      

            
            //para retornar la cantidad a los articulos
            $calculo_cantidad = $resultado_venta["cantidad"] - $cantidad;
            //modificar valores en venta_temp
            $nuevo_itbis= $resultado_cod_impuesto["porciento"] * $cantidad;
            $nuevo_precio = $resultado_articulo["precio"] * $cantidad;
            $nuevo_total = $nuevo_precio + $nuevo_itbis;
            
            $actualizar_venta_temp = $conexion->query("UPDATE $empresa.tbl_venta_temp SET cantidad = $cantidad, precio = $nuevo_precio, itbis = $nuevo_itbis, total = $nuevo_total where id_venta = $id_venta and id_articulo = $articulo");
            echo $articulo." ".$id_venta." Cantidad nueva: ".$cantidad." Sumar a la cantidad existente: ".$calculo_cantidad." Nuevo precio: ".$nuevo_precio." Nuevo itbis: ".$nuevo_itbis." nuevo total: ".$nuevo_total."<br>";
       */
    } }
        $conteo++;
    $insertar_nota_c = $conexion->query("INSERT INTO $empresa.tbl.nota_credito (comprobante_factura, comprobante, creador_por, factura, total, id_articulo_lista, cliente, descripcion) values('$comprobante','b040000001','$usuario', $factura,)");

    
?>