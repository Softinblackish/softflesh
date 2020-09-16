<?php
include("../base.php");

#buscar articulos por id, por nombre o por ambos
if(isset($_GET["cod"]) or isset($_GET["nom"]) )
{
    if(isset($_GET["cod"]) and isset($_GET["nom"]) )
    {
        $id= $_GET["cod"];
        $nomb= $_GET["nom"];
        $consulta_articulos = $conexion->query("SELECT * from $empresa.tbl_articulos where  id_articulo like '%$id%' and nombre like '%$nomb%' limit 10");
    }
    if(isset($_GET["cod"]))
    {
        $id= $_GET["cod"];
        $consulta_articulos = $conexion->query("SELECT * from $empresa.tbl_articulos where  id_articulo like '%$id%' limit 10");
    }
    if(isset($_GET["nom"]))
    {
        $nomb= $_GET["nom"];
        $consulta_articulos = $conexion->query("SELECT * from $empresa.tbl_articulos where  nombre like '%$nomb%' limit 10 ");
    }
}
else
{
    $consulta_articulos = $conexion->query("SELECT * from $empresa.tbl_articulos limit 5");
}




?>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function()
    {
        $("p").click(function()
        {
            alert(this);
        });
        $("#cliente").keyup(function()
        {
            var cliente = $("#cliente").val();
            $.ajax
            ({
                type:"post",
                url:"../../scripts/ventas/buscar_clientes.php",
                dataType:"html",
                data:"nombre="+cliente,
                success: function(data)
                {
                    $("#caja-clientes").empty();
                    $("#caja-clientes").append(data);
                }
            }); 
        });
    });
</script>

<div>
    <div style="float:left; width:48.5%; margin-left:25px; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px; ">
        
    <?php
    if(isset($_GET["disponible"]))
        {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>No hay unidades!</strong> Comunícate con el administrador.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>

        <div style="overflow:scroll;overflow-x:hidden; height:335px; width:98%; margin-left:1.5%">      
        <table class="table">
        <h5 style="padding:15px;Width:47.2%;margin-left:-12px;height:53px;background-color:#882f88;color:white; position:absolute;" >Buscar artículos</h5><br><br>
            <thead style="position:absolute; width:47.2%;margin-top:-66.5px; margin-left:-12px; background-color:white;">
                <tr>
                    <form action="punto_de_venta.php" method="GET">
                    <th scope="col" style="width:10%;"><input type="text" class="form-control" name="cod" placeholder="Cód."></th>
                    <?php if(isset($_GET["id_temp"])){ $id = $_GET["id_temp"]; ?>  <input type="hidden" name="id_temp" value="<?php echo $id ;?>"> <?php }?>
                    <input type="submit" style="display:none">
                    </form>
                    <form action="punto_de_venta.php" method="GET">
                    <th scope="col" style="width:25%;"><input type="text" class="form-control" name="nom" placeholder="NOMBRE"></th>
                    <?php if(isset($_GET["id_temp"])){ $id = $_GET["id_temp"]; ?> <input type="hidden" name="id_temp" value="<?php echo $id; ?>"> <?php } ?>
                    <input type="submit"style="display:none">
                    </form>
                    <th scope="col" style="width:8%;"> ITBIS </th>
                    <th scope="col" style="width:13%;"> Precio</th>
                    <th scope="col" style="width:16%;"> Cant.</th>

                </tr><br><br>
            </thead>
            <div>.</div>
            <tbody >
                    
                <?php
                    while($registros_articulos= $consulta_articulos->fetch_assoc())
                    {
                ?>
                <tr >
                    <th scope="row"><?php echo $registros_articulos["id_articulo"]; ?></th>
                    <td><?php echo $registros_articulos["nombre"]; ?></td>
                    <td>$<?php echo $registros_articulos["itbis"]; ?></td>
                    <td>$<?php echo $registros_articulos["precio"]; ?></td> 

                    <form action="../../scripts/ventas/add_venta_temp.php" method="GET">
                        <input type="hidden" value="<?php echo $registros_articulos["id_articulo"]; ?>" name="cod">
                        <input type="hidden" value="<?php echo $registros_articulos["nombre"]; ?>" name="nom">
                        <input type="hidden" value="<?php echo $registros_articulos["itbis"]; ?>" name="itbis">
                        <input type="hidden" value="<?php echo $registros_articulos["precio"]; ?>" name="precio">
                        
                        <?php if($registros_articulos["cantidad_disponible"] > 0)
                        {
                            $cant= 1;
                        }
                        else
                        { 
                            $cant= 0;
                        } 
                        ?>
                        <td><input type="number" style="width:55px;" class="form-control" pattern="^[0-9]+"  min="0" placeholder="Cant." name="cant" value="<?php echo $cant; ?>"></td>
                        <?php if(isset($_GET["id_temp"])) { $id= $_GET["id_temp"];
                            ?> 
                                <input id="id_temp" type="hidden" value="<?php echo $id ?>" name="id">     
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
    </div>

    <div>
    <div style="float:left; width:48.5%; margin-left:25px; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px">
    <div style="overflow:scroll;overflow-x:hidden; height:390px; width:98%; margin-left:1.5%"> 
        <table class="table">
        <h5 style="padding:15px;Width:47.2%;margin-left:-12px;height:53px;background-color:#882f88;color:white; position:absolute;" >Artículos ingresados</h5>
            <thead  style="position:absolute; width:47.2%;margin-top:-43px; margin-left:-12px; background-color:white;">      
                
                <tr>
                    <th scope="col" width="45%">Artículos</th>
                    <th scope="col" width="10"> Cant.</th>
                    <th scope="col" width="10%"> Itbis </th>
                    <th scope="col" width="15%"> Precio </th>
                    <th scope="col" width="20.5%" > Total </th>
                </tr> <br><br><br>

            </thead>
            <div>.</div>
            <tbody>
            <?php
               if(isset($_GET["id_temp"]))
               {
                $id=$_GET["id_temp"];
                $cons_art_temp = $conexion->query("SELECT * from $empresa.tbl_venta_temp  where id_venta= $id ORDER BY id_venta_temp desc");
                 while($reg_art_temp = $cons_art_temp->fetch_assoc())
                 {
                     ?>
                <tr>
                    <td scope="row"><?php  echo $reg_art_temp["articulo"]; ?></td>
                    <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                    <td>$<?php  echo $reg_art_temp["itbis"]; ?></td>
                    <td>$<?php  echo $reg_art_temp["precio"]; ?></td>
                    <td>$<?php  echo $reg_art_temp["total"]; ?></td>
                    <td><a href="../../scripts/ventas/eliminar_arti_temp.php?id_articulo=<?php echo $reg_art_temp['id_art_temp']; ?> && id_temp=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                </tr>
                <?php
                    }}  
                ?>
            </tbody>
</table>
</div>
    </div>
    </div>
    
    <div>
    <div style="float:left; position:absolute; width:20%; height:750px; margin-left:77%; margin-top:25px;background-color:white; border-radius:8px; box-shadow:1px 1px 5px">
        <div>
            <h5 style="padding:15px; background-color:#882f88 ;color:white;">Información</h5>
            <form action="../../scripts/ventas/registrar_venta.php" method="POST"><br>
                <div class="form-row">
                    <div class="col-md-10">
                        <input style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" id="cliente"   class="form-control" placeholder="Buscar cliente" name="cliente" required/>
                        <div id="caja-clientes"></div>
                    </div>
                
                    <div class="col-md-10">
                        <br>
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control" name="condicion">
                           <?php $consulta_condiciones = $conexion->query("SELECT * FROM $empresa.tbl_condiciones_pago");
                                while($resultado_condiciones = $consulta_condiciones->fetch_assoc()){

                                ?>
                                    <option><?php echo $resultado_condiciones["nombre_condicion_p"] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    <Br></div>

                    <div class="col-md-10">
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control"name="tipo_comprobante">
                            <option>Consumidor final</option>
                            <option>Valor fiscal</option>
                            <option>Gubernamental</option>
                            <option>Régimen especial </option>
                        </select>                  
                    <br></div>

                    <div class="col-md-10">
                        <select style="border-bottom-left-radius: 0px;  border-top-left-radius: 0px;" class="form-control" name="forma">
                            <option>Efectívo</option>
                            <option>Tarjeta</option>
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
                      $sum_itbis = $conexion->query("SELECT SUM(itbis) AS itbis from $empresa.tbl_venta_temp  where id_venta = $id"); 
                      $itbis_sumatoria = $sum_itbis->fetch_assoc();
                      $itbis_total= $itbis_sumatoria["itbis"]; 

                      $sum_precio = $conexion->query("SELECT SUM(precio) AS precio from $empresa.tbl_venta_temp  where id_venta = $id"); 
                      $precio_sumatoria = $sum_precio->fetch_assoc();
                      $precio_total = round($precio_sumatoria["precio"],3);

                      $sum_total = $conexion->query("SELECT SUM(total) AS total from $empresa.tbl_venta_temp  where id_venta = $id"); 
                      $total_sumatoria = $sum_total->fetch_assoc();
                      $total_total = round($total_sumatoria["total"], 2);

                    }
                    else{
                        $itbis_total= 0;
                        $precio_total = 0;
                        $total_total = 0;
                    }  
                ?>
                <!--- Solo vista ----------->  
                <span style="margin-left:10px">Total itbis:</span>  <input max="4" style="float:right;  border-bottom-right-radius: 0px;  border-top-right-radius: 0px; " class="form-control col-md-4"  value="$<?php echo $itbis_total;?>" disabled/> <br><br>
                <span style="margin-left:10px">Total precio: </span> <input  max="5" style="float:right; border-bottom-right-radius: 0px;  border-top-right-radius: 0px;  " class="form-control col-md-4"  value="$<?php echo $precio_total; ?>" disabled/><br><br>
                <span style="margin-left:10px">Total:</span>  <input  max="4" style="float:right; border-bottom-right-radius: 0px;  border-top-right-radius: 0px;  " class="form-control col-md-4" value="$<?php echo $total_total; ?>" disabled/><br><br>

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
