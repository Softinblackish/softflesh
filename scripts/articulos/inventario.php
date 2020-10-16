<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      
      <!-- css -->
      <link rel="stylesheet" href="../../css/scroll.css">
      <link rel="stylesheet" href="../../css/inventario.css">
      <!-- php -->
      <?php include("../base.php"); ?>
      <!-- js -->
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="../../scripts/js/time_alert.js"></script>

<div class="container-inventario">
    <div class="container form-row">
        </center><h2>filtro de busqueda</h2></center>
        <form id="form" method="post">

            <div class="form-row">
                <div class="form-group col-md-8">
                    <input type="text" name="filtro" placeholder ="Buscar" class="form-control">
                </div>
            </div>

            <!--Aqui va la tabla del filtro de busqueda -->
            <div class="tamano_tablas Overflow">
                <table class="table">
                    <h5 class="cabeza_tabla" >Artículos ingresados</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:60%;"> Artículos </th>
                            <th scope="col" style="width:8%;"> Cantidad </th>
                            <th scope="col" style="width:15%;"> Precio </th>
                            <th scope="col" style="width:15%;"> Total </th>
                            <th scope="col" style="width:15%;"> Borrar </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET["filtro"]))
                            {
                                    $id=$_GET["filtro"];
                                    $consulta_art_temp = $conexion->query("select * from $empresa.tbl_compras where     
                                    nombre like %$filtro% or codigo_barra like %$filtro% ");
                            }else
                            {
                                $consulta_art_temp = $conexion->query("select * from $empresa.tbl_art_compras");
                            }    
                            while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_art_temp["articulo"]; ?></th>
                                            <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_compra"]; ?></td>
                                            <?php 
                                            $cantidad= $reg_art_temp["cantidad"];
                                            $precio = $reg_art_temp["precio_compra"];
                                            $total = $cantidad * $precio;
                                            ?>
                                            <td><?php  echo $total ?></td>
                                            <td><a href="../../scripts/compras/borrarArtCompras.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            

            <br>
            <br>
            <input type="" id="btn" class="btn btn" value="ver en detalle" >
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
        </form>
    </div>    
</div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->

