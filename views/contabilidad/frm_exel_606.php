<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
?>

<link rel="stylesheet" href="../../css/reporte_606.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<script src="../../scripts/js/exportar_excel.js"></script>

<link rel="stylesheet" href="../../css/scroll.css">

<div class="container-606">
<div class="container">


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
                    <option value = "" >Todos</option>
                </select> 
        </div>
        <div class="form-group col-md-7">
            
            <input type="submit" class="btn btn" id="buscar" value=" Buscar">
            <!--<button class="btn btn-info" onclick="tableToExcel('testTable', 'Hoja1')">Grabar tabla en exel</button>-->
            <input type="button" class="btn btn-info " onclick="tableToExcel('testTable', 'Hoja1')" value="Descargar">
        </div>
    </div>
    
</form>
     <br><br>
<!--Aqui va la tabla temp del 606-->
<div class="tamano_tablas Overflow" >
                <table class="table" id="testTable">
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
                            <th scope="col" style="width:15%;"> Itebis Facturado</th>
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
                            if(!empty($_POST["filtro"]))
                            {
                                    $filtro=$_POST["filtro"];
                                    $consulta_606 = $conexion->query("SELECT * FROM $empresa.tbl_contabilidad where Fec_comprobante = '$filtro' order by (Fec_comprobante) ");
                            }else
                            {
                                $consulta_606 = $conexion->query("SELECT * FROM $empresa.tbl_contabilidad");
                            }   
                            while($datos_606 = $consulta_606->fetch_assoc())
                                    {
                                        
                                        
                        ?>
                                            <tr>
                                            <th><?php echo $datos_606["tipo_id"]; ?></th>
                                            <td><?php  echo $datos_606["T_Bienes_servicios"]; ?></td>
                                            <td><?php  echo $datos_606["NCF"]; ?></td>
                                            <td><?php  echo $datos_606["NCF_docMod"]; ?></td>
                                            <td><?php  echo $datos_606["Fec_comprobante"]; ?></td>
                                            <td><?php  echo $datos_606["Fec_pago"]; ?></td>
                                            <td><?php  echo $datos_606["Monto_Facturado_Servicios"]; ?></td>
                                            <td><?php  echo $datos_606["Monto_Facturado_Bienes"]; ?></td>
                                            <td><?php  echo $datos_606["Total_Monto_facturado"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_Facturado"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_Retenido"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_sub_a_proporcionalidad"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_llevado_al_costo"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_por_adelantar"]; ?></td>
                                            <td><?php  echo $datos_606["Itebis_percibido_compra"]; ?></td>
                                            <td><?php  echo $datos_606["Tipo_Retencion_ISR"]; ?></td>
                                            <td><?php  echo $datos_606["Monto_Retencion_Renta"]; ?></td>
                                            <td><?php  echo $datos_606["ISR_percibido_compra"]; ?></td>
                                            <td><?php  echo $datos_606["Impuesto_selectivo_consumo"]; ?></td>
                                            <td><?php  echo $datos_606["Monto_prima_legal"]; ?></td>
                                            <td><?php  echo $datos_606["Forma_pago"]; ?></td>
                                            <td><?php  echo $datos_606["Estatus"]; ?></td>
                                            <td><a href="../../scripts/compras/.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            <br>
            
            <!--<button onclick="tableToExcel('testTable', 'Hoja1')">Grabar tabla en exel</button>-->
        </form>
    </div>



<!-- Modal -->


    </div>
    </div>