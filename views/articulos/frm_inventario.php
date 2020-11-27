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
                            <th scope="col" style="width:50%;"> Artículos </th>
                            <th scope="col" > Categoria </th> 
                            <th scope="col" style="width:20%;"> Cant. en sistema </th>
                            <th scope="col" > Cant. fisica </th>                       
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
                            ?>
                            <form action="../../scripts/articulos/pase_inventario.php" method="POST">   
                            <?php
                            while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_art_temp["nombre"]; ?></th>
                                            <td><?php  echo $reg_art_temp["categoria"]; ?></td>
                                            <td><?php  echo $reg_art_temp["cantidad_actual"]; ?></td>
                                            <td> <input required type="number" min = '0' class="form-control" name="cantidad<?php  echo $reg_art_temp["id_articulo"] ; ?>">   </td>
                                            <input required type="hidden" value="<?php  echo $reg_art_temp["id_articulo"] ; ?>"name="articulo<?php  echo $reg_art_temp["id_articulo"] ; ?>" > 
                                            
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>
            
            <input type="submit" style="background-color:#882f88;"   class="btn btn" value="Registrar" >
            </form>
            


         <!--Aqui el final de los div de este formulario-->
        </div>    
    </div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->


            

            
        