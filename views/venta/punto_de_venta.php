<?php
include("../base.php");
?>

<div>
    <div style="float:left; width:48.5%; margin-left:25px; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px">
        <table class="table">
        <h5 style="padding:15px; background-color:#882f88;color:white;" >Buscar artículos</h5>
            <thead>
            
                <tr>
                    <form action="punto_de_venta.php" method="GET">
                    <th scope="col" style="width:16%;"><input type="text" class="form-control" name="cod" placeholder="Código"></th>
                    <?php if(isset($_GET["id_temp"])){ $id = $_GET["id_temp"]; ?>  <input type="hidden" name="id_temp" value="<?php echo $id ;?>"> <?php }?>
                    <input type="submit" style="display:none">
                    </form>
                    <form action="punto_de_venta.php" method="GET">
                    <th scope="col" style="width:50%;"><input type="text" class="form-control" name="nom" placeholder="NOMBRE"></th>
<?php if(isset($_GET["id_temp"])){ $id = $_GET["id_temp"]; ?> <input type="hidden" name="id_temp" value="<?php echo $id; ?>"> <?php } ?>
                    <input type="submit"style="display:none">
                    </form>
                    <th scope="col" style="width:10%;"> ITBIS </th>
                    <th scope="col" style="width:10%;"> Precio</th>
                    <th scope="col" style="width:13%;">Cant.</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($_GET["cod"]) or isset($_GET["nom"]) )
                    {
                        if(isset($_GET["cod"]))
                        {
                            $id= $_GET["cod"];
                            $consulta_articulos = $conexion->query("SELECT * from $empresa.articulos where  id_articullo = $id limit 10");
                        }
                        if(isset($_GET["nom"]))
                        {
                            $nombre= $_GET["nom"];
                            $consulta_articulos = $conexion->query("SELECT * from $empresa.articulos where  Nombre like '%$nombre%' limit 10 ");
                        }
                    }
                    else
                    {
                        $consulta_articulos = $conexion->query("SELECT * from $empresa.articulos limit 5");
                    }
                    
                    while($registros_articulos= $consulta_articulos->fetch_assoc())
                    {
                ?>
                <tr>
                    <th scope="row"><?php echo $registros_articulos["id_articullo"]; ?></th>
                    <td><?php echo $registros_articulos["Nombre"]; ?></td>
                    <td><?php echo $registros_articulos["itbis"]; ?></td>
                    <td><?php echo $registros_articulos["precio"]; ?></td> 
                    <form action="../../scripts/ventas/add_venta_temp.php" method="GET">
                        <input type="hidden" value="<?php echo $registros_articulos["id_articullo"]; ?>" name="cod">
                        <input type="hidden" value="<?php echo $registros_articulos["Nombre"]; ?>" name="nom">
                        <input type="hidden" value="<?php echo $registros_articulos["itbis"]; ?>" name="itbis">
                        <input type="hidden" value="<?php echo $registros_articulos["precio"]; ?>" name="precio">
                        <td><input type="number" class="form-control" placeholder="Cant." name="cant" value="1"/></td>
                        <?php if(isset($_GET["id_temp"])) { $id= $_GET["id_temp"];
                            ?> 
                                <input type="hidden" value="<?php echo $id ?>" name="id">     
                            <?php }?>
                        <td><button type="submit" class="btn btn-info" value="d"><i class="fa fa-arrow-circle-o-down fa-lg"></1></button></td> 
                    </form>

                </tr>
                <?php
                  }
                  ?>
            </tbody>
</table>
    </div>

    <div>
    <div style="float:left; width:48.5%; margin-left:25px; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px">
        <table class="table">
        <h5 style="padding:15px; background-color:#882f88;color:white;" >Artículos ingresados</h5>
            <thead>      
                
                <tr>
                    <th scope="col" style="width:60%;">Artículos</th>
                    <th scope="col" style="width:8%;">Cant.</th>
                    <th scope="col" style="width:10%;"> Itbis </th>
                    <th scope="col" style="width:15%;"> Precio </th>
                    <th scope="col" style="width:15%;"> Total </th>
                </tr>

            </thead>
            <tbody>
            <?php
               if(isset($_GET["id_temp"]))
               {
                   $id=$_GET["id_temp"];
                $cons_art_temp = $conexion->query("select * from $empresa.venta_temp where id_venta= $id");
                 while($reg_art_temp = $cons_art_temp->fetch_assoc())
                 {
                     ?>
                <tr>
                    <th scope="row"><?php  echo $reg_art_temp["articulo"]; ?></th>
                    <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                    <td><?php  echo $reg_art_temp["itbis"]; ?></td>
                    <td><?php  echo $reg_art_temp["precio"]; ?></td>
                    <td><?php  echo $reg_art_temp["total"]; ?></td>
                    <td><a href="../../scripts/ventas/eliminar_arti_temp.php?id_articulo=<?php echo $reg_art_temp['id_art_temp']; ?> && id_temp=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                </tr>
                <?php
                    }}  
                ?>
            </tbody>
</table>
    </div>
    </div>
    
    <div>
    <div style="float:left; position:absolute; width:20%; height:650px; margin-left:77%; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px">
        <div>
            <h5 style="padding:15px; background-color:#882f88 ;color:white;">Información</h5>
            <form action="../../scripts/ventas/registrar_venta.php" method="POST"><br>
                <div class="form-row">
                    <div class="col-md-10">
                        <input style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;"   class="form-control" placeholder="Cliente" name="cliente"/>
                    <br></div>

                    <div class="col-md-10">
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control" name="condicion">
                            <option>Al contado</option>
                        </select>
                    <Br></div>

                    <div class="col-md-10">
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control"name="comprobante">
                            <option>Consumidor final</option>
                        </select>                  
                    <br></div>

                    <div class="col-md-10">
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control" name="forma">
                            <option>Efectívo</option>
                        </select>
                    <br><br></div>

                </div>
        
        </div>
        <div>
            <strong>
                <div style="padding:15px; background-color:#882f88; color:white;">
                    <H5 >Totales</H5>
                </div>
                <?php 
                    if(isset($_GET["id_temp"]))
                    {   
                      $sum_itbis = $conexion->query("SELECT SUM(itbis) AS itbis from $empresa.venta_temp  where id_venta = $id"); 
                      $itbis_sumatoria = $sum_itbis->fetch_assoc();
                      $itbis_total= $itbis_sumatoria["itbis"]; 

                      $sum_precio = $conexion->query("SELECT SUM(precio) AS precio from $empresa.venta_temp  where id_venta = $id"); 
                      $precio_sumatoria = $sum_precio->fetch_assoc();
                      $precio_total = $precio_sumatoria["precio"];

                      $sum_total = $conexion->query("SELECT SUM(total) AS total from $empresa.venta_temp  where id_venta = $id"); 
                      $total_sumatoria = $sum_total->fetch_assoc();
                      $total_total = $total_sumatoria["total"];

                    }
                    else{
                        $itbis_total= 0;
                        $precio_total = 0;
                        $total_total = 0;
                    }  
                ?>
                <!--- Solo vista ----------->  
                <span style="margin-left:10px">Total itbis:</span>  <input maxlength="8" style="float:right;  border-bottom-right-radius: 0px;  border-top-right-radius: 0px; " class="form-control col-md-4"  value="<?php echo $itbis_total;?>" disabled/> <br><br>
                <span style="margin-left:10px">Total precio: </span> <input  maxlength="5" style="float:right; border-bottom-right-radius: 0px;  border-top-right-radius: 0px;  " class="form-control col-md-4"  value="<?php echo $precio_total; ?>" disabled/><br><br>
                <span style="margin-left:10px">Total:</span>  <input  max="8" style="float:right; border-bottom-right-radius: 0px;  border-top-right-radius: 0px;  " class="form-control col-md-4" value="<?php echo $total_total; ?>" disabled/><br><br>

                <!-------Esto es lo que realmente se envia ----->
                <input type="hidden" name="itbis" value="<?php echo $itbis_total;?>" />
                <input type="hidden" name="precio" value="<?php echo $precio_total; ?>"/>
                <input type="hidden" name="total" value="<?php echo $total_total; ?>"/>
                <input type="hidden" name="id_temp" value="<?php echo $id; ?>"


                </strong>
        </div> <br>
       <?php echo "&nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp"?> <button class="btn btn" style="background-color:#882f88; color:white">Cancelar</button> <input type="submit" class="btn btn" style="background-color:#882f88; color:white;" value="Registrar">
                </form>
   </div> 
</div>
