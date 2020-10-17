<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Clientes</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col" width="10%">Código</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_categoria = $conexion->query("SELECT * FROM $empresa.tbl_clientes WHERE id_cliente LIKE '%$filtro%' limit 15");
    }
    else{
        $lista_categoria = $conexion->query("SELECT * FROM $empresa.tbl_clientes limit 15");
    }

    while($row = $lista_categoria->fetch_assoc())
        { 
?>
        <!-- Head Tabla   --->
            <tr>
                <th scope="row"><?php echo $row["id_cliente"]; ?></th>
                <td><?php echo $row["nombre_cliente"];?></td>
                <td><?php echo $row["telefono_cliente"];?></td>

        <td><?php if($permisos['modificar_categorias']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_cliente"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?> <?php if($permisos['eliminar_categorias']== 1){ ?> <a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_cliente"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a><?php } ?> </td>
            </tr>
        <!--Modal editar   --->
                <div class="modal fade" id="example<?php echo $row["id_cliente"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_cliente"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_cliente"];?>Label"><?php echo $row["nombre_cliente"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/clientes/actualizar_clientes.php" method="post">
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Código" name="codigo" value="<?php echo $row["id_cliente"];  ?>" required readonly>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Nombre" value="<?php echo $row["nombre_cliente"];  ?>" name="nombre" required disabled>
                </div>

                <div class="form-group col-md-6">
                <select class="form-control" placeholder ="País" name="pais" required disabled>
                        <option>República Dominicana</option>
                        <option>Haití</option>
                        <option>Puerto Rico</option>
                        <option>Cuba</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                <select class="form-control" placeholder ="Provincia" name="provincia" required disabled>
                        <option>Santo Domingo</option>
                        <option>Santiago</option>
                        <option>La romana</option>
                        <option>San Francisco</option>

                    </select>
                </div>
                <div class="form-group col-md-12">
                    <textarea type="text" class="form-control" placeholder ="Dirección" name="direccion" required  disabled><?php echo $row["direccion"];  ?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Telefono" name="telefono" value="<?php echo $row["telefono_cliente"];  ?>" required disabled >
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Referencia" name="referencia" value="<?php echo $row["referencia"];  ?>" required disabled >
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" placeholder ="Tipo de cliente" name="tipo_cliente" required disabled>
                        <option>Recurrente</option>
                        <option>Ocasional</option>
                        <option>Intermitente</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="RNC" value="<?php echo $row["rnc_cliente"];  ?>" name="rnc" required disabled >
                </div>
            
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" placeholder ="Límite de crédito" value="<?php echo $row["limite_credito"];  ?>" name="credito" required disabled >
                </div>

                                        <div class="form-group col-md-12">   
                                            Fecha: <?php echo $row["fecha_creacion"] . "  &nbsp &nbsp &nbsp  &nbsp  &nbsp  Creado por: " . $row["creado_por"]; ?>
                                        </div>
                                      
                                        <input type="hidden" name="id" value="<?php echo $row["id_cliente"]; ?>" >
                                        
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
        <div class="modal fade" id="eliminar<?php echo $row["id_cliente"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_cliente"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_cliente"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el almacen: <strong> <?php echo $row["nombre_cliente"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/administracion/eliminar_clientes.php?id=<?php echo $row["id_cliente"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
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

<!-- Modal -->
