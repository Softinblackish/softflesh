<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="box_lista">
<h2>Listado de cotizaciones</h2>
<form action="" method="post">
    <div class="form-row">
        <div class="form-group col-md-3">
        <label>Desde</label>
            <input class="form-control"  type="date" name="desde">
        </div>
        <div class="form-group col-md-3" >
            <label>Hasta</label>
            <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
        </div>
        <div class="form-group col-md-3">
            <label>Cotización</label>
            <input class="form-control"  type="number" placeholder="Factura" name="filtro">
        </div>
        <div class="form-group col-md-2">
        <label>.</label>
            <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
        </div>
    </div>
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Cotizacion</th>
      <th scope="col" width="20%">Cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Total</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    
    if(isset($_POST["desde"], $_POST["desde"] , $_POST["filtro"]))
    {
        if( $_POST["desde"] != null and $_POST["hasta"] )
        {
            $desde = $_POST["desde"];
            $hasta = $_POST["hasta"];   
            $lista_usuario = $conexion->query("SELECT * FROM $empresa.tbl_cotizaciones WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
        }
        if( $_POST["filtro"] != null)
        {
            $filtro = $_POST["filtro"];
            $lista_usuario = $conexion->query("SELECT * FROM $empresa.tbl_cotizaciones WHERE id_cotizacion = $filtro ");
        }

    }
    else{
        $lista_cotizaciones = $conexion->query("SELECT * FROM $empresa.tbl_cotizaciones order by id_cotizacion desc limit 10 ");
    }

    while($row = $lista_cotizaciones->fetch_assoc())
        { 
            $cliente = $row['id_cliente'];
            $consulta_clientes = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
            $row2 = $consulta_clientes->fetch_assoc();
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["id_cotizacion"]; ?></th>
                <td width="20%"><?php echo $row2["nombre_cliente"]; ?></td>
                <td><?php echo $row["fecha_creacion"]; ?></td>
                <td><?php echo $row["total"]; ?></td>
                <td><a class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_cotizacion"]; ?>">Facturar</a></td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_cotizacion"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_cotizacion"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_cotizacion "];?>Label">Cotización No. <?php echo $row["id_cotizacion"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/ventas/registrar_venta.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="client" placeholder="Nombre" value="<?php echo $row["id_cliente"]; ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <?php $consulta_condicion_p = $conexion->query("SELECT nombre_condicion_p from $empresa.tbl_condiciones_pago");?>
                                            <select class="form-control" name="condicion">
                                                <?php while($condiciones_p = $consulta_condicion_p->fetch_assoc()) { ?>
                                               <option><?php echo $condiciones_p["nombre_condicion_p"] ?></option>
                                               <?php
                                                }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">  
                                        <?php $consulta_comprobante = $conexion->query("SELECT tipo from $empresa.tbl_comprobantes");?>
                                            <select class="form-control" name="tipo_comprobante">
                                                <?php while($comprobante = $consulta_comprobante->fetch_assoc()) { ?>
                                               <option><?php echo $comprobante["tipo"] ?></option>
                                               <?php
                                                }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">  
                                            <select class="form-control" name="forma">
                                                    <option>Efectivo</option>
                                                    <option>Tarjeta</option>
                                            </select>
                                        </div>
                                        <?php
                                        $id = $row["id_cotizacion"];
                                        $consulta_cotizaciones_id = $conexion->query("SELECT * from $empresa.tbl_cotizaciones WHERE id_cotizacion= $id "); 
                                        $resultados = $consulta_cotizaciones_id -> fetch_assoc();
                                        ?>
                                        <input type="hidden" name="itbis" value="<?php echo $resultados["itbis"]; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $resultados["precio"]; ?>">
                                        <input type="hidden" name="total" value="<?php echo $resultados["total"]; ?>">
                                        <input type="hidden" name="id_temp" value="<?php echo $resultados["id_venta_temp"];?>">
                                    </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <input type="submit" class="btn btn-primary guardar" value="Convertir">
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
</div>
        <!--Modal Eliminar usuario   --->
        <div class="modal fade" id="eliminar<?php echo $row["id_usuario"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_usuario"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_usuario"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el usuario de:<strong> <?php echo $row["nombre_usuario"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/usuarios/eliminar_usuarios.php?id=<?php echo $row["id_usuario"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
</div>

<?php
        }
?>
  </tbody>
</table>

<a href="../administracion/administracion.php" id="buscar" class="btn btn" >
  Volver atras
</a>

<!-- Modal -->
