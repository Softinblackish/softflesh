<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
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
        $lista_usuario = $conexion->query("SELECT * FROM $empresa.roles WHERE nombre_rol LIKE '%$filtro%'");
    }
    else{
        $lista_usuario = $conexion->query("SELECT * FROM $empresa.roles");
    }

    while($row = $lista_usuario->fetch_assoc())
        { 
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["id_rol"]; ?></th>
                <td><?php echo $row["nombre_rol"]; ?></td>
                <td><?php echo $row["descripcion_rol"]; ?></td>
                <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_rol"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  <a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_usuario"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a> </td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_rol"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_rol"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example<?php echo $row["id_rol"];?>Label"><?php echo $row["nombre_rol"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div>
                                <form action="updata_permisas">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                        <h4><strong><input type="checkbox"/> Administración</Strong></h4>
                                            <h4><strong><input type="checkbox"/> Usuarios</Strong></h4>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                            </div><br>
                                            <h4><strong> <input type="checkbox"/> Roles</Strong></h4>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div><br>
                                            <h4><strong><input type="checkbox"/> Empresa</Strong></h4>
                                                <div>
                                                    <input type="checkbox"/> Información<br>
                                                    <input type="checkbox"/> Logo<br>
                                                    <input type="checkbox"/> slogan<br>
                                                </div><br>
                                            <h5><strong><input type="checkbox"/> Condiciones de pago</Strong></h5>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div><br>
                                            <h5><strong><input type="checkbox"/> Códigos de impuestos</Strong></h5>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div><br>
                                            <h4><strong><input type="checkbox"/> Almacenes</Strong></h4>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div><br>
                                            <h4><strong><input type="checkbox"/> Categorías</Strong></h4>
                                                <div>
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div><br>

                                        </div>
                                        <div class="col-md-6">
                                            <h4><Strong><input type="checkbox"/> Clientes</strong></h4>
                                            <div class="col-md-8">
                                            <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> Suplidores</strong></h4>
                                            <div class="col-md-8">
                                            <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> Ventas</strong></h4>
                                            <div class="col-md-8">
                                            <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> Compras</strong></h4>
                                            <div class="col-md-8">
                                            <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> C x pagar</strong></h4>
                                            <div class="col-md-8">
                                            <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> C x cobrar</strong></h4>
                                            <div class="col-md-8">
                                                <input type="checkbox"/> Agregar<br>
                                                <input type="checkbox"/> Ver<br>
                                                <input type="checkbox"/> Editar<br>
                                                <input type="checkbox"/> Eliminar<br>
                                            </div> <br>
                                            <h4><Strong><input type="checkbox"/> Inventario</strong></h4>
                                            <div class="col-md-8">
                                                <input type="checkbox"/> Agregar articulos<br>
                                                <input type="checkbox"/> administracion<br>
                                                <input type="checkbox"/> administracion<br>
                                                <input type="checkbox"/> administracion<br>
                                                <input type="checkbox"/> administracion<br>
                                                <input type="checkbox"/> administracion<br>
                                            </div> <br>

                                        </div>
                                    </div>
                                </form>
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
