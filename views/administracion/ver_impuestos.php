<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Códigos de impuestos</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Código de impuesto</th>
      <th scope="col">Porcentaje</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_impuestos = $conexion->query("SELECT * FROM $empresa.tbl_cod_impuestos WHERE nom_codigo LIKE '%$filtro%'");
    }
    else{
        $lista_impuestos = $conexion->query("SELECT * FROM $empresa.tbl_cod_impuestos");
    }

    while($row = $lista_impuestos->fetch_assoc())
        { 
?>
        <!-- Head Tabla impuestos   --->
            <tr>
                <th scope="row"><?php echo $row["nom_codigo"]; ?></th>
                <td><?php echo $row["porciento"];?>%</td>
                <td width="40%"><?php echo $row["descripcion"]; ?></td>
        <td><?php if($permisos['editar_cod_impuestos']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_cod_impuesto"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?> <?php if($permisos['eliminar_cod_impuestos']== 1){ ?> <a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_cod_impuesto"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a><?php } ?> </td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_cod_impuesto"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_cod_impuesto"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_cod_impuesto"];?>Label"><?php echo $row["nom_codigo"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/administracion/actualizar_impuestos.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row["nom_codigo"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="porciento" placeholder ="Porciento" value="<?php echo $row["porciento"]; ?>" disabled class="form-control " >
                                        </div>
                                        <div class="form-group col-md-6">   
                                            <input type="text" name="descripcion" placeholder ="Descripción" value="<?php echo $row["descripcion"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            .
                                        </div>
                                        <div class="form-group col-md-12">   
                                            Creado por: <?php echo $row["creado_por"]; ?>
                                        </div>
                                      
                                        <input type="hidden" name="id" value="<?php echo $row["id_cod_impuesto"]; ?>" >
                                        
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
        <!--Modal Eliminar usuario   --->
        <div class="modal fade" id="eliminar<?php echo $row["id_cod_impuesto"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_cod_impuesto"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_cod_impuesto"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el impuesto: <strong> <?php echo $row["nom_codigo"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/administracion/eliminar_impuestos.php?id=<?php echo $row["id_cod_impuesto"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
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
