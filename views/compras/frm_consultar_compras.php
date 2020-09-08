<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Compras</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Fecha</th>
      <th scope="col">articulos</th>
      <th scope="col">precio</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Total</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_compras = $conexion->query("SELECT * FROM $empresa.tbl_compras WHERE suplidor LIKE '%$filtro%'");
    }
    else{
        $lista_compras = $conexion->query("SELECT * FROM $empresa.tbl_compras");
    }

    while($row = $lista_compras->fetch_assoc())
        { 
?>
        <!-- Head Tabla Compras   --->
            <tr>
                <th scope="row"><?php echo $row["no_compra"]; ?></th>
                <td><?php echo $row["fecha_orden"]; ?></td>
                <td><?php echo $row["articulo"]; ?></td>
                <td><?php echo $row["precio_compra"]; ?></td>
                <td><?php echo $row["cantidad"]; ?></td>
                <td><?php echo $row["valor_total"]; ?></td>
                

                <!--Boton actualizar informacion-->
                <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["no_compra"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  
                <!--Boton eliminar-->
                <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["no_compra"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>
            </tr>
        <!--Modal editar compras   --->
                <div class="modal fade" id="example<?php echo $row["no_compra"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["no_compra"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example<?php echo $row["no_compra"];?>Label"><?php echo $row["nombre"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario compras   --->
                                <form action="../../scripts/compras/modificar.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="descripcion" placeholder ="descripcion" value="<?php echo $row["descripcion"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select id="inputState" class="form-control" name="categoria" disabled>
                                                <option select><?php echo $row["categoria"]; ?></option>
                                                <option>Electricos</option>
                                                <option>comestibles</option>
                                                <option>bebidas</option>
                                                <option>herramientas</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select id="inputState" class="form-control" name="unidad" disabled>
                                                <option select ><?php echo $row["unidad"];  ?></option>
                                                <option>libra</option>
                                                <option>metro</option>
                                                <option>centimetos</option>
                                                <option>pulgadas</option>
                                                <option>pies</option>
                                                <option>galones</option>
                                                <option>una media(1/2)</option>
                                                <option>una cuarta(1/4)</option>
                                                <option>Unidad</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row["no_compra"]; ?>">
                                        <div class="form-group col-md-6">
                                            Ultimo acceso:  <?php echo $row["ultimo_acceso"]; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            Fecha de creación:  <?php echo $row["fecha_creacion"]; ?>
                                        </div>
                                    </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <button type="button" class="btn btn-warning editar" ><i class="fa fa-pencil fa-lg"></i></button>
                                <input type="submit" class="btn btn-primary guardar" value="Guardar" style="display:none;">
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
</div>
        <!--Modal Eliminar compras   --->
        <div class="modal fade" id="eliminar<?php echo $row["no_compra"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["no_compra"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["no_compra"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el articulo :<strong> <?php echo $row["nombre"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/compras/eliminar.php?id=<?php echo $row["no_compra"]?>" class="btn btn-danger" value="borrar">Borrar</a>
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