<?php
    include("../../scripts/conexion/cone.php");
    session_start();
    $empresa= $_SESSION['empresa'];

    $factura = $_GET["id_venta"];
    $consulta_factura = $conexion->query("SELECT * FROM $empresa.tbl_ventas where id_venta = $factura");
    $registro_factura = $consulta_factura->fetch_assoc();

    $cliente = $registro_factura["id_cliente"];
    $consulta_cliente = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
    $registro_cliente = $consulta_cliente->fetch_assoc();

    $id_temp= $registro_factura["id_venta_temp"];
    $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_venta_temp where id_venta = $id_temp");

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
        <title>Factura</title>
    </head>
    <body>
        <div id="contenedor" style="">
            <div id="top" style="">
            <img id="img-bg-top" src="../../img/barra-larga-azul-info.png" style="">
                <center><br>
                        <h3><?php echo $empresa ?></h3>
                        Aqui va el slogan
                    
                </center>
            </div>
            <div id="informacion">
                <div id="informacion_cliente">
                    <ul>
                        <li>Cliente:<?php echo  $registro_cliente["nombre"];?></li>
                        <li>RNC o cédula:<?php echo  $registro_cliente["rnc"];?></li>
                        <li>Dirección:<?php echo  $registro_cliente["direccion"];?></li>
                        <li>Referencia:<?php echo  $registro_cliente["referencia"];?></li>
                        <li>Telefono:<?php echo  $registro_cliente["telefono"];?></li>
                    </ul>
                </div>
                <div id="informacion_factura">
                    <h3>Factura Nº </h3>
                    <div id="informacion_factura_label">
                        <ul>
                            <li>Fecha: </li>
                            <li>Tipo de comprobante:</li>
                            <li>Comprobante:</li>
                            <li>Comprobante vence:</li>
                            <li>Condición de pago</li>
                            <li>Forma de pago:</li>
                        </ul>
                    </div>
                    <div id="informacion_factura_data">
                        <ul>
                            <li><?php echo  $registro_factura["fecha_creacion"];?></li>
                            <li><?php echo  $registro_factura["tipo_comprobante"];?></li>
                            <li><?php echo  $registro_factura["comprobante"];?></li>
                            <li><?php echo  $registro_factura["fecha_creacion"];?></li>
                            <li><?php echo  $registro_factura["condicion_pago"];?></li>
                            <li><?php echo  $registro_factura["forma_pago"];?></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <table class="table table-striped" style="width:95%; margin-left:2.5%">
                    <thead>
                        <tr>
                        <th scope="col" width="57.5%">Producto</th>
                        <th scope="col" width="7%">Cantidad</th>
                        <th scope="col" width="7%">Itbis</th>
                        <th scope="col" width="14%">Precio unid.</th>
                        <th scope="col" width="15%">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            </div>
            <div id="factura_pie">
                <div id="botones">
                    <a class="btn btn-info">Regresar</a> <a class="btn btn-info">Imprimir</a>
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
                            <li>52</li>
                            <li>544</li>
                            <li>65655</li>
                        </ul>
                    </div>
                </div>
            </div> 
    </body>
    </html>
