<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Roles</h2>
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
        <td><?php if($permisos['modificar_roles']== 1){ ?><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_rol"]; ?>" > <i class="fa fa-eye fa-lg"></i></a><?php } ?> <?php if($permisos['eliminar_roles']== 1){ ?><a class="btn btn-danger"  data-toggle="modal" data-target="#eliminar<?php echo $row["id_rol"]; ?>" ><i class="fa fa-trash-o fa-lg"></i></a> <?php } ?> </td>
            </tr>
        <!--Modal editar usuario   --->
                <div class="modal fade" id="example<?php echo $row["id_rol"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_rol"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:rgb(87, 220, 200); color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_rol"];?>Label">Rol: <?php echo $row["nombre_rol"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                               <div>
                            
                               <?php 
                               $empresa=$_SESSION["empresa_db"];
                               $rol= $row["nombre_rol"];
                               $obtener_permisos = $conexion->query("SELECT * FROM $empresa.tbl_permisos where rol ='$rol'"); 
                               $row_permisos = $obtener_permisos->fetch_assoc();
                               ?>
                            
                                <form action="../../scripts/administracion/actualizar_permisos.php" method="POST">
                                    <input type="hidden" name="rol" value="<?php echo $row["nombre_rol"]; ?>"/>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div>
                                                <h4><strong><input type="checkbox" <?php if($row_permisos["administracion"]== 1){ ?>  checked <?php } ?>  name="admin"/> Administración</Strong></h4>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["usuarios"]== 1){?> checked <?php } ?> name="usuarios"/> Usuarios</Strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_user"]== 1){?> checked <?php } ?> name="agregar_user"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_user"]== 1){?> checked <?php } ?>  name="ver_user"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["modificar_user"]== 1){?> checked <?php } ?>  name="editar_user"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_user"]== 1){?> checked <?php } ?>  name="eliminar_user"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><strong> <input type="checkbox"  <?php if($row_permisos["roles"]== 1){?> checked <?php } ?>  name="roles"/> Roles</Strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_roles"]== 1){?> checked <?php } ?> name="agregar_roles"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_roles"]== 1){?> checked <?php } ?> name="ver_roles"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["modificar_roles"]== 1){?> checked <?php } ?> name="modificar_roles"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_roles"]== 1){?> checked <?php } ?>name="eliminar_roles"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                            <div class="box-modulos">   
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["empresa"]== 1){?> checked <?php } ?> name="empresa"/> Empresa</Strong></h4>
                                                <div class="col-md-10">
                                                   </div><br>
                                            </div>
                                            <div class="box-modulos">   
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["condiciones_p"]== 1){?> checked <?php } ?> name="condiciones_p"/> Condiciones de pago</Strong></h5>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_condiciones_p"]== 1){?> checked <?php } ?> name="agregar_condiciones_p"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_condiciones_p"]== 1){?> checked <?php } ?> name="ver_condiciones_p"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["modificar_condiciones_p"]== 1){?> checked <?php } ?> name="modificar_condiciones_p"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_condiciones_p"]== 1){?> checked <?php } ?> name="eliminar_condiciones_p"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["cod_impuestos"]== 1){?> checked <?php } ?> name="cod_impuestos"/> Impuestos</Strong></h5>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_cod_impuestos"]== 1){?> checked <?php } ?> name="agregar_cod_impuestos"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_cod_impuestos"]== 1){?> checked <?php } ?> name="ver_cod_impuestos"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["editar_cod_impuestos"]== 1){?> checked <?php } ?> name="editar_cod_impuestos"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_cod_impuestos"]== 1){?> checked <?php } ?> name="eliminar_cod_impuestos"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                            <div class="box-modulos"> 
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["almacenes"]== 1){?> checked <?php } ?> name="almacenes"/> Almacenes</Strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_almacenes"]== 1){?> checked <?php } ?> name="agregar_almacenes"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_almacenes"]== 1){?> checked <?php } ?> name="ver_almacenes"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["editar_almacenes"]== 1){?> checked <?php } ?> name="editar_almacenes"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_almacenes"]== 1){?> checked <?php } ?> name="eliminar_almacenes"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><strong><input type="checkbox" <?php if($row_permisos["categorias"]== 1){?> checked <?php } ?> name="categorias"/>  Categorías</Strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox" <?php if($row_permisos["agregar_categorias"]== 1){?> checked <?php } ?> name="agregar_categorias"/> Agregar<br>
                                                    <input type="checkbox" <?php if($row_permisos["ver_categorias"]== 1){?> checked <?php } ?> name="ver_categorias"/> Ver<br>
                                                    <input type="checkbox" <?php if($row_permisos["modificar_categorias"]== 1){?> checked <?php } ?> name="modificar_categorias"/> Editar<br>
                                                    <input type="checkbox" <?php if($row_permisos["eliminar_categorias"]== 1){?> checked <?php } ?> name="eliminar_categorias"/> Eliminar<br>
                                                </div><br>
                                            </div>
                                
                                        </div>
                                        
                                        <div class="col-md-6">
                                        
                                            <div class="box-modulos" style="margin-top:40px;">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["clientes"]== 1){?> checked <?php } ?> name="clientes"/> Clientes</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["suplidores"]== 1){?> checked <?php } ?> name="suplidores"/>  Suplidores</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["ventas"]== 1){?> checked <?php } ?> name="ventas"/>  Ventas</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["compras"]== 1){?> checked <?php } ?> name="compras"/>  Compras</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["cxp"]== 1){?> checked <?php } ?> name="cxp"/>  C x pagar</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" <?php if($row_permisos["cxc"]== 1){?> checked <?php } ?> name="cxc"/>  C x cobrar</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar<br>
                                                    <input type="checkbox"/> Ver<br>
                                                    <input type="checkbox"/> Editar<br>
                                                    <input type="checkbox"/> Eliminar<br>
                                                </div> <br>
                                            </div>
                                            <div class="box-modulos">
                                                <h5><Strong><input type="checkbox" /> Inventario</strong></h4>
                                                <div class="col-md-8">
                                                    <input type="checkbox"/> Agregar articulos<br>
                                                    <input type="checkbox"/> administracion<br>
                                                
                                                </div><br>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                               </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
</div>
        <!--Modal Eliminar usuario   --->
        <div class="modal fade" id="eliminar<?php echo $row["id_rol"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_rol"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["id_rol"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <?php
                                $nombre_rol = $row["nombre_rol"];
                                $consulta_usuarios = $conexion->query("SELECT nombre_usuario FROM $empresa.tbl_usuario WHERE rol_usuario = '$nombre_rol' "); 
                                $cantidad_de_registros = $consulta_usuarios->num_rows;
                                if($cantidad_de_registros < 1)
                                {
                            ?>
                                    Seguro que desea eliminar el rol de:<strong> <?php echo $nombre_rol?> </strong>?
                            <?php
                                }
                                else
                                {
                                    echo ("No deben haber usuarios con el rol asignado, primero quite el rol en los usuarios");
                                }
                                
                            ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                            <?php if($cantidad_de_registros < 1) { ?>  <a href="../../scripts/administracion/eliminar_rol.php?id=<?php echo $row["id_rol"]?>" class="btn btn-danger" value="Guardar">Borrar</a> <?php } ?>
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
