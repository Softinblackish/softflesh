<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div id="box_lista">
<h2>Cierres de venta</h2>
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
            <label>Cierre</label>
            <input class="form-control"  type="number" placeholder="Cierre" name="filtro">
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
      <th scope="col">Caja</th>
      <th scope="col" width="20%">Sucursal</th>
      <th scope="col">Usuario</th>
      <th scope="col">Fecha</th>
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
            $lista_cierres = $conexion->query("SELECT * FROM $empresa.tbl_cierre_caja WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
        }
        if(isset($_POST["filtro"]))
        {
            $filtro = $_POST["filtro"];
            $lista_cierres = $conexion->query("SELECT * FROM $empresa.tbl_cierre_caja WHERE id_cierre = $filtro ");
        }

    }
    else{
        $lista_cierres = $conexion->query("SELECT * FROM $empresa.tbl_cierre_caja ");
    }

    while($row = $lista_cierres->fetch_assoc())
        { 
            $cierre = $row['id_cierre'];
            $consulta_cierre = $conexion->query("SELECT * FROM $empresa.tbl_cierre_caja where id_cierre = $cierre");
            $row2 = $consulta_cierre->fetch_assoc();

            $nombre_caja = $row2["caja"];
            $consulta_cajas = $conexion->query("SELECT caja_nombre, caja_sucursal FROM $empresa.tbl_cajas where ip = '$nombre_caja' ");
            $resultado_cajas = $consulta_cajas->fetch_assoc();
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $resultado_cajas["caja_nombre"]; ?></th>
                <td width="20%"><?php echo $resultado_cajas["caja_sucursal"]; ?></td>
                <td><?php echo $row["creado_por"]; ?></td>
                <td><?php echo $row["fecha_creacion"]; ?></td>
                
                <td><a class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_cierre"]; ?>">Info <i class="fa fa-plus-circle"></i></a></td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_cierre"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_cierre"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_cierre"];?>Label">Info <?php echo $row["caja"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/ventas/registrar_venta.php" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                        <label>ID</label>
                                            <input type="text" name="client" placeholder="Nombre" value="<?php echo $row["id_cierre"]; ?>" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                        <label>Apertura</label>
                                           <input type="text" name="" value="<?php echo $row["apertura"]; ?>" id="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">  
                                        <label>Vendido</label>
                                            <input type="text" value="<?php echo $row["vendido"]; ?>" id="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6"> 
                                        <label>Total en caja</label> 
                                            <input type="text" value="<?php echo $row["total_caja"]; ?>" id="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">  
                                        <label>En caja al cierre</label>
                                            <input type="text" value="<?php echo $row["total"]; ?>" id="" readonly class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">  
                                        <label>Diferencia</label>
                                            <input type="text" value="<?php echo $row["diferencia"]; ?>" id="" readonly class="form-control">
                                        </div>
                                      
                                    </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
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
