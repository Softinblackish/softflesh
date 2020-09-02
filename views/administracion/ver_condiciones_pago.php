<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Condiciones de pago</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Nombre de condiciones de pago</th>
      <th scope="col">Días</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_condicion = $conexion->query("SELECT * FROM $empresa.tbl_condiciones_pago WHERE nombre_condicion_p LIKE '%$filtro%'");
    }
    else{
        $lista_condicion = $conexion->query("SELECT * FROM $empresa.tbl_condiciones_pago");
    }

    while($row = $lista_condicion->fetch_assoc())
        { 
?>
        <!-- Head Tabla impuestos   --->
            <tr>
                <th scope="row"><?php echo $row["nombre_condicion_p"]; ?></th>
                <th scope="row"><?php echo $row["dias_condicion_p"]; ?></th>
                <td><?php echo $row["descripcion_condicion_p"];?></td>
                <td><?php if($permisos['modificar_condiciones_p']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_condicion_p"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?> <?php if($permisos['eliminar_condiciones_p']== 1){ ?> <a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_condicion_p"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a><?php } ?> </td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_condicion_p"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_condicion_p"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_condicion_p"];?>Label"><?php echo $row["nombre_condicion_p"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/administracion/actualizar_condicion.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre_condicion_p"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="dias" placeholder="Dias" value="<?php echo $row["dias_condicion_p"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="text" name="descripcion" placeholder ="Descripcion" value="<?php echo $row["descripcion_condicion_p"]; ?>" disabled class="form-control" />
                                        </div>
                                        <div class="form-group col-md-12">   
                                            Fecha: <?php echo $row["fecha_creacion"] . "  &nbsp &nbsp &nbsp  &nbsp  &nbsp  Creado por: " . $row["creado_por"]; ?>
                                        </div>
                                      
                                        <input type="hidden" name="id" value="<?php echo $row["id_condicion_p"]; ?>" >
                                        
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <button type="button" class="btn btn-warning editar" ><i class="fa fa-pencil fa-lg"></i></button>
                                <input type="submit" class="btn btn-primary guardar" value="Guardar" style="display:none;">
                            </div>
                        </div>
                    </div>
                </div>
</div>
        <!--Modal Eliminar usuario   --->
        <div class="modal fade" id="eliminar<?php echo $row["id_condicion_p"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_condicion_p"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_condicion_p"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar la condicion: <strong> <?php echo $row["nombre_condicion_p"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/administracion/eliminar_condicion.php?id=<?php echo $row["id_condicion_p"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
                            </div>
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
