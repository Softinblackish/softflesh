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
                                <th scope="col" style="width:60%;"> Cant a devolver </th>
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
                                                    <form action="../../scripts/compras/devoluciones.php" method="post">
                                                        <td> <input required type="number" name="cantidad" min = '0' class="form-control"></td>

                                                        <input type="hidden" name="id" class="form-control" value="<?php echo $row["no_compra"]; ?>">
                                                        <input type="hidden" name="articulo" class="form-control" value="<?php echo $row["articulo"]; ?>">
                                                        <input type="hidden" name="cantidad_actual" class="form-control" value="<?php echo $row["cantidad"]; ?>">
                                                        <input type="hidden" name="precio" class="form-control" value="<?php echo $row["precio_compra"]; ?>">
                                                        <input type="hidden" name="total" class="form-control" value="<?php echo $row["total"]; ?>">
                                                        <input type="hidden" name="caducidad" class="form-control" value="<?php echo $row["caducidad"]; ?>">
                                                        
                                                        <td>
                                                            <button type="sumit"><i class="fa fa-eye fa-lg"></i></button>
                                                        </td>
                                                    </form>
                                                </tr>



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


<!--
<td>
<a href="../../scripts/compras/devoluciones.php?id=<?php echo $row["no_compra"]?>" id="actualizar" class="btn btn-info"> <i class="fa fa-eye fa-lg"></i></a>  
</td>
-->