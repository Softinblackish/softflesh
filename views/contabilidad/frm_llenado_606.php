<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
      
      <!-- css -->
      <link rel="stylesheet" href="../../css/formulario_606.css">
      <link rel="stylesheet" href="../../css/scroll.css">
      
      <!-- js -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="../../scripts/js/time_alert.js"></script>
      <script src="../../scripts/js/formulario_606.js"></script>
         
<!--
    /*
    tipo_id,
    T_Bienes_servicios,
    NCF,
    NCF_docMod,
    Fec_comprobante,
    Fec_pago,
    Monto_Facturado_Servicios,
    Monto_Facturado_Bienes,
    Total_Monto_facturado,
    Itebis_Facturado,
    Itebis_Retenido,
    Itebis_sub_a_proporcionalidad,
    Itebis_llevado_al_costo,
    Itebis_por_adelantar,
    Itebis_percibido_compra,
    Tipo_Retencion_ISR,
    Monto_Retencion_Renta,
    ISR_percibido_compra,
    Impuesto_selectivo_consumo,
    Monto_prima_legal,
    Forma_pago,
    Estatus
    */
-->

<div class="container-606">
    <div class="container form-row">

        <form id="form" action="../../scripts/contabilidad/606.php" method="post">

            <div class="cabeza">
            <?php if(isset($_GET["registro"])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>listo! </strong> Exelente registro continue.
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
               <h2> Formato de Envío de Compras de Bienes y Servicios 606</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputState">RNC o CEDULA:</label>
                    <input type="text" name="nombre" placeholder ="" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">PERIODO:</label>
                        <select id="" name="periodo_principal" class="form-control" placeholder="Periodo">
                            <?php $periodo = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606"); 
                            while($row = $periodo->fetch_assoc()) {
                            ?>
                            <option value = <?php echo $row["periodo"];  ?> ><?php echo $row["periodo"];  ?></option>
                            <?php }?>
                        </select> 
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">CANTIDAD DE REGISTRO:</label>
                    <input type="text" name="codigo_barra" placeholder ="" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-1">
                <label for="inputState">Tipo id:</label>
                    <input type="number" id="tipo_id" name="tipo_id" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Tipo de Bienes y Servicios:</label>
                    <select id="inputState" class="form-control" name="T_Bienes_servicios">
                                <option selected="01-GASTOS DE PERSONAL">01-GASTOS DE PERSONAL</option>
                                <option selected="02-GASTOS POR TRABAJOS,SUMINISTROS Y SERVICIOS">02-GASTOS POR TRABAJOS,SUMINISTROS Y SERVICIOS</option>
                                <option selected="03-ARRENDAMIENTOS">03-ARRENDAMIENTOS</option>
                                <option selected="04-GASTOS ACTIVOS FIJOS">04-GASTOS ACTIVOS FIJOS</option>
                                <option selected="05-GASTOS REPRESENTATIVOS">05-GASTOS REPRESENTATIVOS</option>
                                <option selected="06-OTRAS REDUCIONES ADMITIDAS">06-OTRAS REDUCIONES ADMITIDAS</option>
                                <option selected="07-GASTOS FINANCIEROS">07-GASTOS FINANCIEROS</option>
                                <option selected="08-GASTOS EXTRAORDINARIOS">08-GASTOS EXTRAORDINARIOS</option>
                                <option selected="09-COMPRAS Y GASTOS QUE FORMAN PARTE DEL COSTO DE VENTA">09-COMPRAS Y GASTOS QUE FORMAN PARTE DEL COSTO DE VENTA</option>
                                <option selected="10-ADQUISICION DE ACTIVOS">10-ADQUISICION DE ACTIVOS</option>
                                <option selected="11-GASTOS SEGUROS">11-GASTOS SEGUROS</option>
                        </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">NFC:</label>
                    <input id="ganancia" name="NCF" placeholder ="" class="form-control" >
                </div>
                <!--secuencia 2-->
                <div class="form-group col-md-3">
                    <label for="inputState">Fecha comprobante:</label>
                    <select id="" name="Fec_comprobante" class="form-control" placeholder="Periodo">
                            <?php $periodo = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606"); 
                            while($row = $periodo->fetch_assoc()) {
                            ?>
                            <option value = <?php echo $row["periodo"];  ?> ><?php echo $row["periodo"];  ?></option>
                            <?php }?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Fecha de pago:</label>
                    <select id="" name="Fec_pago" class="form-control" placeholder="Periodo">
                            <?php $periodo = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606"); 
                            while($row = $periodo->fetch_assoc()) {
                            ?>
                            <option value = <?php echo $row["periodo"];  ?> ><?php echo $row["periodo"];  ?></option>
                            <?php }?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Monto Facturado en servicios:</label>
                    <input type="number" name="Monto_Facturado_Servicios" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Monto Facturado en Bienes:</label>
                    <input type="number" name="Monto_Facturado_Bienes" placeholder ="" class="form-control" >
                </div>
                <!--secuencia 3-->
                <div class="form-group col-md-3">
                    <label for="inputState">Total monto Facturado:</label>
                    <input type="number" name="Total_Monto_facturado" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis Facturado:</label>
                    <input type="number" name="Itebis_Facturado" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis Retenido</label>
                    <input type="number" name="Itebis_Retenido" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Ibis a proporcion(art.349):</label>
                    <input type="number" name="Itebis_sub_a_proporcionalidad" placeholder ="" class="form-control" >
                </div>
                <!--secuencia 4-->
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis llevado al costo:</label>
                    <input type="number" name="Itebis_llevado_al_costo" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis por Adelantar:</label>
                    <input type="number" name="Itebis_por_adelantar" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis Percibido en Compra</label>
                    <input type="number" name="Itebis_percibido_compra" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Tipo Retencion en ISR:</label>
                    <input type="number" name="Tipo_Retencion_ISR" placeholder ="" class="form-control" >
                </div>
                <!--secuencia 5-->
                <div class="form-group col-md-3">
                    <label for="inputState">Monto Retencion Renta:</label>
                    <input type="number" name="Monto_Retencion_Renta" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">ISR Percibido en Compra:</label>
                    <input type="number" name="ISR_percibido_compra" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Imp. Selectivo al Consumo</label>
                    <input type="number" name="Impuesto_selectivo_consumo" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Monto propina legal:</label>
                    <input type="number" name="Monto_prima_legal" placeholder ="" class="form-control" >
                </div>
                <!--secuencia 6-->
                <div class="form-group col-md-3">
                    <label for="inputState">Forma de Pago:</label>
                    <input type="number" name="Forma_pago" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Estatus:</label>
                    <input type="number" name="Estatus" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Generar Periodo:</label>
                    <a href="../../scripts/contabilidad/Generar_periodo.php" class="btn btn-success">Click me to Generate</a>
                </div>
                
            </div>

            <!--Aqui se pasan las 606-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn">Registrar los Datos</button>
                </div>
            </div>

            <!--Aqui va la tabla temp del 606-->
            <div class="tamano_tablas Overflow">
                <table class="table">
                    <h5 class="cabeza_tabla" >Datos procesados</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:60%;"> # </th>
                            <th scope="col" style="width:8%;"> Bienes o servicios </th>
                            <th scope="col" style="width:15%;"> NFC </th>
                            <th scope="col" style="width:10%;"> Fecha Comprobante </th>
                            <th scope="col" style="width:15%;"> Monto Facturado </th>
                            <th scope="col" style="width:15%;"> Total </th>
                            <th scope="col" style="width:15%;"> Estado </th>
                            <th scope="col" style="width:15%;"> Accion </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET["tipo_id"]))
                            {
                                    //$id=$_GET["tipo_id"];
                                    $consulta_606 = $conexion->query("select * from $empresa.tbl_contabilidad ");
                            }else
                            {
                                $consulta_606 = $conexion->query("select * from $empresa.tbl_contabilidad");
                            }    
                            while($reg_datos_606 = $consulta_606->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_datos_606["id_contabilidad"]; ?></th>
                                            <td><?php  echo $reg_datos_606["T_Bienes_servicios"]; ?></td>
                                            <td><?php  echo $reg_datos_606["NCF"]; ?></td>
                                            <td><?php  echo $reg_datos_606["Fec_comprobante"]; ?></td>
                                            <td><?php  echo $reg_datos_606["Monto_Facturado_Servicios"]; ?></td>
                                            <td><?php  echo $reg_datos_606["Total_Monto_facturado"]; ?></td>
                                            <td><?php  echo $reg_datos_606["Estatus"]; ?></td>
                                            <td><a href="../../scripts/compras/.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>



            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo formulario
            </label>
            <br>
            <br>
            <input type="submit" id="btn" class="btn btn" value="Registrar formulario 606" >
            <br>
        </form>
    </div>    
</div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->
