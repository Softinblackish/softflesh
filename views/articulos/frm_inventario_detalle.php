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
        <div class="container">

            <form action="" method="post">
                <div class="cabeza">
                    <h2>Detalle Inventario</h2>
                </div>
                <br>
                <input type="text" name="filtro" placeholder ="Buscar" class="form-control">   
                <button type="submit" class="btn btn">Buscar</button>
            </form>

            <!--Aqui va la tabla del filtro de busqueda -->
            <div class="tamano_tablas Overflow">
                <table class="table">
                    <h5 class="cabeza_tabla" >Artículos Ingresados</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:60%;"> Artículos </th>
                            <th scope="col" style="width:15%;"> Stock </th>
                            <th scope="col" style="width:15%;"> Cantidad Actual </th>
                            <th scope="col" style="width:60%;"> Categoria </th>
                            <th scope="col" style="width:60%;"> Unidad </th>
                            <th scope="col" style="width:15%;"> Id Barra </th>
                            <th scope="col" style="width:15%;"> Precio compra</th>
                            <th scope="col" style="width:15%;"> Precio Venta </th>
                            <th scope="col" style="width:15%;"> Impuestos </th>
                            <th scope="col" style="width:15%;"> Total </th>
                            <th scope="col" style="width:15%;"> Borrar </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET["filtro"]))
                            {
                                    $id=$_GET["filtro"];
                                    $consulta_art_temp = $conexion->query("select * from $empresa.tbl_articulos WHERE  nombre LIKE '%$filtro%' or codigo_barra LIKE '%$filtro%' or categoria LIKE '%$filtro%' or unidad LIKE '%$filtro%' or precio_compra LIKE '%$filtro%'");
                            }else
                            {
                                $consulta_art_temp = $conexion->query("select * from $empresa.tbl_articulos");
                            }    
                            while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_art_temp["nombre"]; ?></th>
                                            <td><?php  echo $reg_art_temp["stop_min"]; ?></td>
                                            <th><?php  echo $reg_art_temp["cantidad_actual"]; ?></th>
                                            <th><?php  echo $reg_art_temp["categoria"]; ?></th>
                                            <th><?php  echo $reg_art_temp["unidad"]; ?></th>
                                            <td><?php  echo $reg_art_temp["codigo_barra"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_compra"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_venta"]; ?></td>
                                            <td><?php  echo $reg_art_temp["cod_impuesto"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_ganancia"]; ?></td>
                                            <td><a href="../../scripts/compras/borrarArtCompras.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
        
            <button> <a href="../articulos/frm_inventario.php" id="btn" class="btn btn" >Volver atras</a></button>
            


         <!--Aqui el final de los div de este formulario-->
        </div>    
    </div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->


            

            
        