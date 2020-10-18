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
                <h2> Reporte Compras </h2>
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
            <div class="form-group col-md-2">
            <label>.</label>
                <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
            </div>
        </div>
    </form> 


    <div class="form-row">
        <div class="form-group col-md-12">

                <!--Aqui va la tabla de articulos de compras para devoluciones -->
                
                    <table class="table">
                    <h5 class="cabeza_tabla" >Detalle de compra</h5>
                        <thead class="thead">      
                            
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" style="width:60%;"> Articulos </th>
                                <th scope="col" style="width:15%;"> Cantidad </th>
                                <th scope="col" style="width:15%;"> Precio </th>
                                <th scope="col" style="width:15%;"> Total </th>
                                <th scope="col" style="width:15%;"> Accion </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $empresa = $_SESSION["empresa_db"];

                                if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
                                {
                                    if($_POST["desde"] and $_POST["hasta"] )
                                        {
                                            $desde = $_POST["desde"];
                                            $hasta = $_POST["hasta"];
                                            $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_compras WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
                                        }
                                    if($_POST["filtro"])
                                        {
                                            $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE articulo LIKE '%$filtro%' limit 5");
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
                                                    <?php 
                                                    $cantidad= $row["cantidad"];
                                                    $precio = $row["precio_compra"];
                                                    $total = $cantidad * $precio;
                                                    ?>
                                                    <td><?php  echo $total ?></td>
                                                    
                                                    <!--Boton actualizar informacion-->
                                                    <td><a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["no_compra"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>  
                                                    <!--Boton eliminar-->
                                                    <a                 class="btn btn-danger"data-toggle="modal" data-target="#eliminar<?php echo $row["no_compra"]; ?>" > <i class="fa fa-trash-o fa-lg"></i></a> </td>
                                                </tr>
                            <?php
                                        }
                            ?>
                        </tbody>
                    </table> 
                

        </div>
        <div class="form-group col-md-4">
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
        </div>
    </div>