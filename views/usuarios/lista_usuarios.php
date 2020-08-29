<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Usuarios</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre usuario</th>
      <th scope="col">Rol</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_usuario = $conexion->query("SELECT * FROM $empresa.tbl_usuario WHERE nombre_usuario LIKE '%$filtro%'");
    }
    else{
        $lista_usuario = $conexion->query("SELECT * FROM $empresa.tbl_usuario");
    }

    while($row = $lista_usuario->fetch_assoc())
        { 
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["id_usuario"]; ?></th>
                <td><?php echo $row["nombre_usuario"]; ?></td>
                <td><?php echo $row["rol_usuario"]; ?></td>
        <td><?php if($permisos['modificar_user']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_usuario"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?> <?php if($permisos['eliminar_user']== 1){ ?> <a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_usuario"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a><?php } ?> </td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_usuario"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_usuario"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_usuario"];?>Label"><?php echo $row["nombre_usuario"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario usuario   --->
                                <form action="../../scripts/usuarios/actualizar_usuarios.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $row["nombre"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="cedula" placeholder ="Cedula" value="<?php echo $row["cedula_usuario"]; ?>" disabled class="form-control " >
                                        </div>
                                        <div class="form-group col-md-6">   
                                            <input type="text" name="horario" placeholder ="Horario" value="<?php echo $row["horario"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">   
                                            <input type="text" name="sucursal" placeholder ="Sucursal" value="<?php echo $row["sucursal_usuario"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select id="inputState" class="form-control" name="rol" disabled>
                                                <option select><?php echo $row["rol_usuario"]; ?></option>
                                                <option >Vendedor</option>
                                                <option >Facturador</option>
                                                <option >Administrador</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <select id="inputState" class="form-control" name="status" disabled>
                                                <option select ><?php echo $row["status"];  ?></option>
                                                <option >activo</option>
                                                <option>inactivo</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row["id_usuario"]; ?>">
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
