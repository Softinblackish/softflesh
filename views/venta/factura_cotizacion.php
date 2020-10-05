<?php
    include("../../scripts/conexion/cone.php");
    session_start();
    $empresa= $_SESSION['empresa'];

    $factura = $_GET["id_venta"];
    $consulta_factura = $conexion->query("SELECT * FROM $empresa.tbl_cotizaciones where id_cotizacion = $factura");
    $registro_factura = $consulta_factura->fetch_assoc();

    $cliente = $registro_factura["id_cliente"];
    $consulta_cliente = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
    $registro_cliente = $consulta_cliente->fetch_assoc();

    $id_temp= $registro_factura["id_venta_temp"];
    $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_venta_temp where id_venta = $id_temp");

    $sum_itbis = $conexion->query("SELECT SUM(itbis) AS itbis from $empresa.tbl_venta_temp  where id_venta = $id_temp"); 
    $itbis_sumatoria = $sum_itbis->fetch_assoc();
    $itbis_total= $itbis_sumatoria["itbis"]; 

    $sum_precio = $conexion->query("SELECT SUM(precio) AS precio from $empresa.tbl_venta_temp  where id_venta = $id_temp"); 
    $precio_sumatoria = $sum_precio->fetch_assoc();
    $precio_total = round($precio_sumatoria["precio"],3);

    $sum_total = $conexion->query("SELECT SUM(total) AS total from $empresa.tbl_venta_temp  where id_venta = $id_temp"); 
    $total_sumatoria = $sum_total->fetch_assoc();
    $total_total = round($total_sumatoria["total"], 2);

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/factura_venta.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">
    window.history.forward();
    function sinVueltaAtras(){ window.history.forward(); }
</script>
        <title>Cotización</title>
    </head>
    <body onload="sinVueltaAtras();" onpageshow="if (event.persisted) sinVueltaAtras();" onunload="">
        <div id="contenedor">
            <div id="top">
            <img id="img-bg-top" src="../../img/barra-larga-azul-info.png">
                <br>
                        <div id="slogan">
                        <h3><?php echo $empresa ?></h3>
                        Aqui va el slogan
                        </div>
            </div>
            <div id="informacion">
                <div id="informacion_cliente">
                    <ul>
                        <li><Strong>Cliente:</strong> <?php echo  $registro_cliente["nombre_cliente"];?></li>
                        <li><Strong>RNC o cédula:</Strong> <?php echo  $registro_cliente["rnc_cliente"];?></li>
                        <li><Strong>Dirección:</Strong> <?php echo  $registro_cliente["direccion"];?></li>
                        <li><Strong>Referencia:</Strong> <?php echo  $registro_cliente["referencia"];?></li>
                        <li><Strong>Telefono:</Strong> <?php echo  $registro_cliente["telefono_cliente"];?></li>
                    </ul>
                </div>
                <div id="informacion_factura">
                    <h3 id="text-factura">Cotización Nº <?php echo  $registro_factura["id_cotizacion"];?> </h3>
                </div>
            </div>
            <div>
                <table class="table table-striped" style="width:95%; margin-left:2.5%">
                    <thead>
                        <tr>
                        <th scope="col" width="57.5%">Producto</th>
                        <th scope="col" width="7%">Cant.</th>
                        <th scope="col" width="7%">Itbis</th>
                        <th scope="col" width="12%">Precio unid.</th>
                        <th scope="col" width="12%">Precio</th>
                        <th scope="col" width="12%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($registros_articulos = $consulta_articulos->fetch_assoc()) { ?>
                            <tr>
                                <td scope="row"><?php echo $registros_articulos["articulo"] ?></td>
                                <td><?php echo $registros_articulos["cantidad"]; ?></td>
                                <td>$<?php echo $registros_articulos["itbis"]; ?></td>
                                <td>$<?php echo $registros_articulos["precio"] / $registros_articulos["cantidad"]; ?></td>
                                <td>$<?php echo $registros_articulos["precio"]; ?></td>
                                <td>$<?php echo $registros_articulos["total"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <hr>
            </div>
            <div id="factura_pie">
                <div id="botones">
                    <a href="cotizaciones.php" class="btn btn-info">Regresar</a> <a class="btn btn-info">Imprimir</a>
                </div>
                
                <div id="totales">
                   <CENTER> TOTALES </CENTER><HR>
                    <div id="totales_label">
                        <ul>
                            <li>ITBIS:</li>
                            <li>Valor:</li>
                            <li>Total:</li>
                        </ul>
                    </div>
                    <div id="totales_data">
                        <ul>
                            <li>$<?php echo $itbis_total; ?></li>
                            <li>$<?php echo $precio_total; ?></li>
                            <li>$<?php echo $total_total; ?></li>
                        </ul>
                    </div>
                </div>
            </div> 
    </body>

        <img class="fixed-bottom" src="../../img/logo.png" width="110"alt="">

    </html>
