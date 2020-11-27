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

            <form id="form" method="post">
                <div class="cabeza">
                    <h2>Pasar Inventario</h2>
                </div>
                <br>
                <input type="text" name="filtro" placeholder ="Buscar Articulo" class="form-control">   
                <button type="submit" class="btn btn">Buscar</button>
            </form>

            <!--Aqui va la tabla del filtro de busqueda -->
            <div class="tamano_tablas Overflow">
                <table class="table">
                    <h5 class="cabeza_tabla" >Artículos Ingresados</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:60%;"> Artículos </th>
                            <th scope="col" style="width:60%;"> Categoria </th>
                            <th scope="col" style="width:15%;"> stock </th>
                            <th scope="col" style="width:15%;"> Id Barra </th>                        
                            <th scope="col" style="width:15%;"> Precio compra </th>
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
                                    $consulta_art_temp = $conexion->query("select * from $empresa.tbl_articulos where     
                                    nombre like %$filtro% or codigo_barra like %$filtro% ");
                            }else
                            {
                                $consulta_art_temp = $conexion->query("select * from $empresa.tbl_articulos");
                            }    
                            while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_art_temp["nombre"]; ?></th>
                                            <td><?php  echo $reg_art_temp["categoria"]; ?></td>
                                            <td><?php  echo $reg_art_temp["stop_min"]; ?></td>
                                            <td><?php  echo $reg_art_temp["codigo_barra"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_compra"]; ?></td>
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
            
            <a style="background-color:#882f88;" href="../articulos/frm_inventario_detalle.php"  class="btn btn" >Ver en detalles</a>
            
            


         <!--Aqui el final de los div de este formulario-->
        </div>    
    </div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->


            

            
        