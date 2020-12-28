<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE nominaS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php");
            include("../../scripts/conexion/cone.php"); ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/reporte_nomina.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->


<div class="container-devoluciones">
    <div class="container form-row">

    <form action="" method="post">
        <div class="cabeza">
                <h2> Nomina </h2>
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
                <input class="form-control"  type="number" placeholder="Factura" name="filtro">
            </div>
            <div class="form-group col-md-3">
            <label>.</label>
                <input type="submit" class="btn btn form-control" id="buscar" value="Generar nomina">
            </div>
            <div class="form-group col-md-1">
              
            </div>
        </div>
    </form> 

    <!--
    <div class="form-row">
        <div class="form-group col-md-12">
-->
                <!--Aqui va la tabla de articulos de nominas para devoluciones -->
                
                    <table class="table">
                    <h5 class="cabeza_tabla" >Generacion de la nomina</h5>
                        <thead class="thead">      
                            
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:20%;">Fecha</th>
                                <th scope="col" style="width:30%;"> Nombre </th>
                                <th scope="col" style="width:10%;"> Sueldo </th>
                                <th scope="col" style="width:10%;"> Descuento </th>
                                <th scope="col" style="width:10%;"> Total </th>
                                <!--<th scope="col" style="width:60%;"> Accion </th>-->
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $empresa = $_SESSION["empresa_db"];
                            
                            if( isset($_POST["desde"]) || isset($_POST["hasta"]) || isset($_POST["filtro"]) )
                                {
                                    if($_POST["desde"] and $_POST["hasta"] )
                                        {
                                            $desde = $_POST["desde"];
                                            $hasta = $_POST["hasta"];
                                            $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_nomina WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' and estado = 'activo' ");
                                            $consulta=1;
                                        }
                                    if($_POST["filtro"])
                                        {
                                            $filtro = $_POST["filtro"];
                                            $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_nomina WHERE no_nomina LIKE '%$filtro%' and estado = 'activo' limit 5");
                                            $consulta=1;
                                        }                  
                                }else{
                                    //$consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_nomina");
                                    $consulta=0;
                                }    
                                if($consulta > 0 ) {    
                                    while($row = $consulta_articulos->fetch_assoc())
                                        {
                            ?>
                                                <!-- Head Tabla nominas   --->
                                                <tr>
                                                    <th scope="row"><?php echo $row["no_nomina"]; ?></th>
                                                    <td><?php echo $row["fecha_creacion"]; ?></td>
                                                    <td><?php echo $row["empleado"]; ?></td>
                                                    <td><?php echo $row["sueldo"]; ?></td>
                                                    <td><?php echo $row["salud"]; ?></td>
                                                    <td><?php echo $row["sueldo"]; ?></td>
                                                    
                                                    <!--Boton actualizar informacion-
                                                    <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["no_nomina"]; ?>" > <i class="fa fa-eye fa-lg"></i></a> --> 
                                                    <!--Boton eliminar
                                                    <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["no_nomina"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>-->
                                                </tr>





        <!--Modal editar nominas   --->
        <div class="modal fade" id="example<?php echo $row["no_nomina"];?>" tabindex="-1" 
         aria-labelledby="example<?php echo $row["no_nomina"];?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example<?php echo $row["no_nomina"];?>">
                        <?php echo $row["articulo"]; ?>
                        </h5>
                        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                     <!-- formulario nominas   --->
                        <form action="../../scripts/nominas/modificar.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="articulo" placeholder="articulo" value="<?php echo $row["articulo"]; ?>" disabled class="form-control">
                                    </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="cantidad" placeholder ="cantidad" value="<?php echo $row["cantidad"]; ?>" disabled class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                     <input type="text" name="precio" placeholder ="precio" value="<?php echo $row["precio_nomina"]; ?>" disabled class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <?php 
                                        $precio = $row["precio_nomina"];
                                        $cantidad = $row["cantidad"];
                                        $valor = $precio * $cantidad;
                                    ?>
                                    <input type="text" name="cantidad" placeholder ="valor" value="<?php echo $valor ?>" disabled class="form-control" >
                                </div>
                                <input type="hidden" name="id" value="<?php echo $row["no_nomina"]; ?>">
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

    <!--Modal Eliminar nominas   --->
        <div class="modal fade" id="eliminar<?php echo $row["no_nomina"];?>" tabindex="-1" 
         aria-labelledby="eliminar<?php echo $row["no_nomina"];?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminar<?php echo $row["no_nomina"];?>Label">Eliminar</h5>
                        <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            Seguro que desea eliminar el articulo :<strong> <?php echo $row["articulo"];?> </strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                        <a href="../../scripts/nominas/eliminar.php?id=<?php echo $row["no_nomina"]?>" class="btn btn-danger" value="borrar">Borrar</a>
                    </div>
                 </div>
            </div>
        </div>




                            <?php
                                        }
                                    }else{}
                            ?>
                        </tbody>
                    </table> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <a href="../nominas/frm_nominas.php" id="buscar" class="btn btn" >
                            Volver atras
                            </a>
                        </div>
                        <div class="form-group col-md-6">
                            <?php
                            if( isset($_POST["desde"]) || isset($_POST["hasta"]) || isset($_POST["filtro"]) ){
                                $filtro=$_POST["filtro"];
                                $desde =$_POST["desde"];
                                $hasta =$_POST["hasta"];
                            }else{
                                $filtro=0;
                                $desde ="";
                                $hasta ="";
                            }
                            ?>
                            <?php //echo $filtro; ?>
                            <a href="rpt_nominas.php?desde=<?php echo $desde; ?> &hasta=<?php echo $hasta;?>
                            &filtro=<?php echo $filtro; ?> ">
                                <input type="" class="btn btn form-control" id="buscar" value="Imprimir" readonly>
                            </a> 
                            
                        </div>
                    </div> 
                

        </div>
        
    </div>