<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php");
            include("../../scripts/conexion/cone.php"); ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/devoluciones.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->


<div class="container-devoluciones">
    <div class="container form-row">

    <form action="" method="post">
        <div class="cabeza">
                <h2> Devoluciones</h2>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
            <label>Desde</label>
                <input class="form-control"  type="date" name="desde">
            </div>
            <div class="form-group col-md-3" >
                <label>Hasta</label>
                <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
            </div>
            <div class="form-group col-md-2">
                <label>Num. factura</label>
                <input class="form-control"  type="number" placeholder="Factura" name="buscar">
            </div>
            <div class="form-group col-md-2">
            <label>.</label>
                <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
            </div>
        </div>
    </form> 


    <div class="table" >
        <div >

                <!--Aqui va la tabla de articulos de compras para devoluciones -->
                
                    <table class="table">
                    <h5 class="cabeza_tabla" >Detalle de compra</h5>
                        <thead class="thead">      
                            
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:20%;">Fecha</th>
                                <th scope="col" style="width:30%;"> Articulos </th>
                                <th scope="col" style="width:10%;"> Cantidad </th>
                                <th scope="col" style="width:10%;"> Precio </th>
                                <th scope="col" style="width:10%;"> Total </th>
                                <th scope="col" style="width:60%;"> Accion </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $empresa = $_SESSION["empresa_db"];
                            try {
                                if(isset($_POST["desde"], $_POST["hasta"], $_POST["buscar"]))
                                {
                                    if($_POST["desde"] && $_POST["hasta"] )
                                        {
                                            $desde = $_POST["desde"];
                                            $hasta = $_POST["hasta"];
                                            $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_art_compras WHERE fecha_orden >= '$desde' and fecha_orden <= '$hasta' ");
                                        }

                                    if($_POST["desde"])
                                        {
                                            $desde = $_POST["desde"];
                                            $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE fecha_orden >= '$desde' ");
                                        }

                                    if($_POST["hasta"] )
                                    {
                                        $hasta = $_POST["hasta"];   
                                        $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE fecha_orden <= '$hasta' ");
                                    }
                                    if($_POST["buscar"])
                                        {
                                            $buscar = $_POST["buscar"];
                                            $consulta_articulos = $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE no_compra LIKE '%$buscar%'");
                                        }                  
                                }else{
                                    $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
                                }
                                   
                                        while($row = $consulta_articulos->fetch_assoc())
                                        {
                            ?>
                                                <!-- Head Tabla Compras   --->
                                                <tr>
                                                    <th scope="row"><?php echo $row["no_compra"]; ?></th>
                                                    <td><?php echo $row["fecha_orden"]; ?></td>
                                                    <td><?php echo $row["articulo"]; ?></td>
                                                    <td><?php echo $row["cantidad"]; ?></td>
                                                    <td><?php echo $row["precio_compra"]; ?></td>
                                                    <td><?php  echo $row["total"]; ?></td>
                                                    
                                                    
                                                    <!--Boton actualizar informacion-->
                                                    <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["no_compra"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  
                                                    <!--Boton eliminar-->
                                                    <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["no_compra"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>
                                                </tr>



                                            <!--Modal editar compras   --->
        <div class="modal fade" id="example<?php echo $row["no_compra"];?>" tabindex="-1" 
             aria-labelledby="example<?php echo $row["no_compra"];?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example<?php echo $row["no_compra"];?>"><?php echo $row["articulo"]; ?></h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario compras   --->
                                <form action="../../scripts/compras/modificar.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="articulo" placeholder="articulo" value="<?php echo $row["articulo"]; ?>" disabled class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="cantidad" placeholder ="cantidad" value="<?php echo $row["cantidad"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="precio" placeholder ="precio" value="<?php echo $row["precio_compra"]; ?>" disabled class="form-control" >
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" name="cantidad" placeholder ="valor" value="<?php echo $row["total"]; ?>" disabled class="form-control" >
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row["no_compra"]; ?>">
                                        <div class="form-group col-md-6">
                                            Fecha de creación:  <?php echo $row["fecha_orden"]; ?>
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
        <div class="modal fade" id="eliminar<?php echo $row["no_compra"];?>" tabindex="-1" 
                    aria-labelledby="eliminar<?php echo $row["no_compra"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="eliminar<?php echo $row["no_compra"];?>Label">Eliminar</h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Seguro que desea eliminar el articulo :<strong> <?php echo $row["articulo"];?> </strong>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                <a href="../../scripts/compras/eliminar.php?id=<?php echo $row["no_compra"]?>" class="btn btn-danger" value="borrar">Borrar</a>
                            </div>
                        </div>
                    </div>
        </div>



                            <?php
                                        }}catch (Exception $e) {
                                            echo 'Caught exception: ', $e->getMessage(), "\n";
                                          }
                            ?>
                        </tbody>
                    </table> 
                

        </div>
        <a href="../compras/frm_compras.php" id="buscar" class="btn btn" >
        Volver atras
        </a>
    </div>











    





            
<!--Aqui el final de los div de este formulario-->
    </div>    
</div>