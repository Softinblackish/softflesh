<?php include("../base.php");
      include("../../scripts/conexion/cone.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista">
<h2>Articulos</h2>
<form action="" method="post">
    <input  type="text" placeholder="Buscar" name="filtro">
    <input type="submit" class="btn btn" id="buscar" value=" Buscar">
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Codigo Barra</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoria</th>
      <th scope="col">Unidad</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    if(isset($_POST["filtro"])){
        $filtro= $_POST["filtro"];
        $lista_articulos = $conexion->query("SELECT * FROM $empresa.tbl_articulos WHERE nombre LIKE '%$filtro%'");
    }
    else{
        $lista_articulos = $conexion->query("SELECT * FROM $empresa.tbl_articulos");
    }

    while($row = $lista_articulos->fetch_assoc())
        { 
?>
        <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["codigo_barra"]; ?></th>
                <td><?php echo $row["nombre"]; ?></td>
                <td><?php echo $row["descripcion"]; ?></td>
                <td><?php echo $row["categoria"]; ?></td>
                <td><?php echo $row["unidad"]; ?></td>

                <!--Boton actualizar informacion-->
                <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["codigo_barra"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  
                <!--Boton eliminar-->
                <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["codigo_barra"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>
            </tr>
        <!--Modal editar Articulos   --->
                <div class="modal fade" id="example<?php echo $row["codigo_barra"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["codigo_barra"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example<?php echo $row["codigo_barra"];?>Label"><?php echo $row["nombre"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario articulos   --->
                                <form action="../../scripts/articulos/modificar.php" method="post">
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
                                        <input type="hidden" name="id" value="<?php echo $row["codigo_barra"]; ?>">
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
        <!--Modal Eliminar articulos   --->
        <div class="modal fade" id="eliminar<?php echo $row["codigo_barra"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["codigo_barra"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["codigo_barra"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el articulo :<strong> <?php echo $row["nombre"];?> </strong>?
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/articulos/eliminar.php?id=<?php echo $row["id_articulo"]?>" class="btn btn-danger">Borrar</a>
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