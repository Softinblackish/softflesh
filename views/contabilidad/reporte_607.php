<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/reporte607.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<script src="../../scripts/js/devolucion_articulos.js"></script>
<script src="tableToExcel.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>



<div id="box_lista">
<div>
<h2>Reporte 607</h2>
<form method="post">
    <div  class="form-row" style="float: left !important;">
        <div class="col-md-3">  
            <label for="desde">desde</label>
            <input class="form-control"  type="date" name="desde"/>
        </div>
        <div class="form-group col-md-3" >
            <label for="desde">Hasta</label>
            <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
        </div>
       
        <div class="form-group col-md-2">
            <label>Comprobante</label>
            <input class="form-control"  type="number" placeholder="Comprobante" name="filtro">
        </div>
        <div class="form-group col-md-2">
            <label>.</label>
            <input type="submit" class="btn btn form-control buscar" value="Buscar">
        </div>
        <div class="form-group col-md-2">
            <label for="">.</label>
            <input type="button" class="btn btn form-control buscar" onclick="tableToExcel('testTable', 'Hoja1')" value="Descargar">
        </div>
    </div>
</form>
</div>
            <table class="table" id="testTable">
            <thead class="thead">      
                <tr>
                <th scope="col">#</th>
                <th scope="col">RNC/Cedula o Pasaporte</th>
                <th scope="col">Tipo identificación</th>
                <th scope="col">Comprobante</th>
                <th scope="col">Comprobante Modificado</th>
                <th scope="col">Tipo ingreso</th>
                <th scope="col">Fecha Comprobante</th>
                <th scope="col">Fecha Retención</th>
                <th scope="col">Monto Facturado</th>
                <th scope="col">ITBIS facturado</th>
                <th scope="col">Retenido terceros</th>
                <th scope="col">ITBIS Percibido</th>
                <th scope="col">Selectivo consumo</th>
                <th scope="col">Otros impuestos/tasa</th>
                <th scope="col">Propina legal</th>
                <th scope="col">lo que sea</th>
                <th scope="col">Cheque /Tranferencia/Deposito</th>
                <th scope="col">Tarjeta Débito/Crédito</th>
                <th scope="col">Venta a Crédito</th>
                <th scope="col">Bonos/regalos</th>
                <th scope="col">Permuta</th>
                <th scope="col">Otras formas</th>
                </tr>
  </thead>
  <div id="testeo">
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
    {
        if( $_POST["desde"] and $_POST["hasta"] )
        {
            $desde = $_POST["desde"];
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' and tipo_comprobante <> 'Consumidor final'");
        }

        if( $_POST["desde"])
        {
            $desde = $_POST["desde"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion >= '$desde' ");
        }

        if($_POST["hasta"] )
        {
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE fecha_creacion <= '$hasta' ");
        }

        if( $_POST["filtro"])
        {
            $filtro = $_POST["filtro"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas WHERE id_venta = $filtro ");
        }
    }
    else{
        $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_ventas  where tipo_comprobante <> 'Consumidor final' order by id_venta desc");
    }
    $contador = 1;
    while($row = $lista_venta->fetch_assoc())
        { 
            $cliente = $row['id_cliente'];
            $consulta_clientes = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
            $row2 = $consulta_clientes->fetch_assoc();
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $contador?></th>
                <td width="20%"><?php echo $row2["rnc_cliente"]; ?></td>
                <td><?php echo $row2["tipo_identificacion"]; ?></td>

                
                <td>
                    <?php
                        if($row["devolucion"]== 1)
                        {
                            $comprobante_factura = $row["comprobante"]; 
                            $consulta_notas_credito = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito where comprobante_factura = '$comprobante_factura'");
                            $resultados = $consulta_notas_credito->fetch_assoc();
                            echo $resultados["comprobante"];
                        }
                        else{
                            echo $row["comprobante"];
                        }
                    ?></td>
                <td><?php echo $row["comprobante"]; ?></td>

                <td>1</td>
                <td><?php echo $row["fecha_creacion"]; ?></td>
                <td>N/A</td>

                <td><?php echo $row["precio"]; ?></td>

                <td><?php echo $row["itbis"]; ?></td>

                <td>N/A</td>

                <td>0</td>

                <td><?php echo $row["itbis"]; ?></td>

                <td>N/A</td>

                <td>0</td>


                <td><?php echo $row["total"]; ?></td>
                <td>0</td>

                <td>0</td>

                <td>0</td>

                <td>0</td>

                <td>0</td>

                <td>0</td>
        </div>

<?php
       $contador++; }
?>
  </tbody>
    </div>
</table>
    </div>
    </div>
    <script src="../../scripts/js/exportar_excel.js"></script>
<!-- Modal -->
