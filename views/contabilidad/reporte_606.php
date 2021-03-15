<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
?>

<link rel="stylesheet" href="../../css/reporte_606.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<script src="../../scripts/js/exportar_excel.js"></script>

<link rel="stylesheet" href="../../css/scroll.css">

<div class="container-606">
<div class="container ">


<form action="" method="post">
    <div class="cabeza">
        <h2>Reporte de 606</h2>
    </div>
    </br>

    <div class="form-row">
        <div class="form-group col-md-5">
            
                <select id="" name="filtro" class="form-control" placeholder="Periodo">
                    <?php $periodo = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606"); 
                    while($row = $periodo->fetch_assoc()) {
                    ?>
                    <option value = <?php echo $row["periodo"];  ?> ><?php echo $row["periodo"];  ?></option>
                    <?php }?>
                </select> 
        </div>
        <div class="form-group col-md-7">
            
            <input type="submit" class="btn btn" id="buscar" value=" Buscar">
            <a href="../../scripts/contabilidad/Registro_compra_606.php" class="btn btn-info">Generar 606</a>
        </div>
    </div>
    
</form>
     <br><br>
<!--Aqui va la tabla temp del 606-->
<div class="tamano_tablas Overflow" >
                <table class="table" id= "testTable">
                    <h5 class="cabeza_tabla" >Datos procesados</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:20%;"> Tipo ID </th>
                            <th scope="col" style="width:60%;"> Bienes o servicios </th>
                            <th scope="col" style="width:8%;"> NFC </th>
                            <th scope="col" style="width:8%;"> NFC modificado</th>
                            <th scope="col" style="width:10%;"> Fecha Comprobante </th>
                            <th scope="col" style="width:10%;"> Fecha Pago </th>
                            <th scope="col" style="width:25%;"> Monto Facturado en Servicios</th>
                            <th scope="col" style="width:25%;"> Monto Facturado en Bienes</th>
                            <th scope="col" style="width:15%;"> Total Monto Facturado</th>
                            <th scope="col" style="width:15%;"> Itebis Retenido</th>
                            <th scope="col" style="width:25%;"> Itebis subjecto a proporcionalidad</th>
                            <th scope="col" style="width:25%;"> Itebis llevado al costo</th>
                            <th scope="col" style="width:25%;"> Itebis por Adelantar</th>
                            <th scope="col" style="width:25%;"> Itebis Percibido en Compra</th>
                            <th scope="col" style="width:25%;"> Tipo de Retencion en ISR</th>
                            <th scope="col" style="width:25%;"> Monto Retenido en Renta</th>
                            <th scope="col" style="width:25%;"> ISR Percibido en Compra</th>
                            <th scope="col" style="width:25%;"> Impuesto Seletivo al consumo</th>
                            <th scope="col" style="width:25%;"> Monto Prima Legar</th>
                            <th scope="col" style="width:25%;"> Forma de Pago</th>
                            <th scope="col" style="width:15%;"> Estatus </th>
                            <th scope="col" style="width:15%;"> Accion </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            if(isset($_POST["filtro"]))
                            {
                                    $filtro=$_POST["filtro"];
                                    //$consulta_606 = $conexion->query("select * from $empresa.tbl_contabilidad ");
                                    $consulta_606 = $conexion->query("select art.articulo as T_Bienes_servicios, art.precio_compra as precio, art.cantidad, art.total as Total_Monto_facturado, det.comprobante, det.forma_pago, det.valor_impuestos, det.sin_impuestos, cod_I.porciento as ibis_retenido ,sup.rnc_sup as NCF, det.periodo FROM $empresa.tbl_compras det INNER JOIN $empresa.tbl_art_compras art on det.no_compra = art.no_compra INNER JOIN $empresa.tbl_suplidores sup on sup.codigo_sup = det.cod_proveedor INNER JOIN $empresa.tbl_cod_impuestos cod_I on cod_I.id_cod_impuesto = det.cod_impuesto where det.periodo = '$filtro'
                                    order by (det.periodo)");
                            }else
                            {
                                $consulta_606 = $conexion->query("select art.articulo as T_Bienes_servicios, art.precio_compra as precio, art.cantidad, art.total as Total_Monto_facturado, det.comprobante, det.forma_pago, det.valor_impuestos, det.sin_impuestos, cod_I.porciento as ibis_retenido ,sup.rnc_sup as NCF, det.periodo FROM $empresa.tbl_compras det INNER JOIN $empresa.tbl_art_compras art on det.no_compra = art.no_compra INNER JOIN $empresa.tbl_suplidores sup on sup.codigo_sup = det.cod_proveedor INNER JOIN $empresa.tbl_cod_impuestos cod_I on cod_I.id_cod_impuesto = det.cod_impuesto order by (det.periodo)");
                            }   
                            $cont = 0; 
                            $sumaMonto = 0;
                            while($reg_datos_606 = $consulta_606->fetch_assoc())
                                    {
                                        
                                        $cont =$cont + 1;
                                        $sumaMonto = $sumaMonto + $reg_datos_606["Total_Monto_facturado"];
                        ?>
                                            <tr>
                                            <th><?php echo $cont ?></th>
                                            <td><?php  echo $reg_datos_606["T_Bienes_servicios"]; ?></td>
                                            <td><?php  echo $reg_datos_606["NCF"]; ?></td>
                                            <td>No Aplica</td>
                                            <td><?php  echo $reg_datos_606["periodo"]; ?></td>
                                            <td>No Aplica</td>
                                            <td>0</td>
                                            <td><?php  echo $reg_datos_606["Total_Monto_facturado"]; ?></td>
                                            <td><?php echo $sumaMonto ?></td>
                                            <td><?php  echo $reg_datos_606["ibis_retenido"]; ?></td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td><?php  echo $reg_datos_606["forma_pago"]; ?></td>
                                            <td>Bien</td>
                                            <td><a href="../../scripts/compras/.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            <br>
            <button onclick="tableToExcel('testTable', 'Hoja1')">Grabar tabla en exel</button>
        </form>
    </div>



<!-- Modal -->


    </div>
    </div>