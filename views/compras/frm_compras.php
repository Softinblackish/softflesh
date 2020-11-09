<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
        <?php include("../base.php"); ?>
        <?php include("../../scripts/compras/compras_general_id_temp.php"); 
            $id_nueva_compra = $conexion->query("SELECT no_compra FROM $empresa.tbl_compra_id_temp where id_compra = 1 ");
            $id_temp = $id_nueva_compra->fetch_assoc();
            $no_compra = $id_temp["no_compra"];
        ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/compras.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->
        
        <script src="../../scripts/compras/articulosCompras.js"></script>                            
        
        <script src="../../scripts/js/time_alert.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<div class="container-compras">
    <div class="container form-row">
        <form id="form" action="../../scripts/compras/compras.php" method="post">
            <div class="cabeza">
                <?php if(isset($_GET["registro"])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>listo! </strong> Nueva Compra registrada
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
               <h2> Registro de Compras</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputState">No de commpra:</label>
                    <input type="number" name="no_compra" readonly placeholder ="no de compra" value = <?php echo $no_compra ?> class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">caducidad:</label>
                    <input type="date" name="caducidad" class="form-control" >
                </div>
                
                <div class="form-group col-md-3">
                    <label for="inputState">recibido por:</label>
                    <select name="entregar_a" class="form-control" cajeros>
                        <option value="cajero1">cajero1</option>
                        <option value="cajero2">cajero2</option>
                        <option value="cajero3">cajero3</option>
                        <option value="cajero4">cajero4</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Moneda:</label>
                    <select name="moneda" class="form-control" cajeros>
                        <option value="cajero1">usd</option>
                        <option value="cajero2">do</option>
                        <option value="cajero3">c por pagar</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Forma de pago:</label>
                    <input type="text" name="forma_pago" class="form-control"  placeholder="forma de pago" >
                </div>
                <div class="form-group col-md-9">
                    <label for="inputState">Total General:</label>
                    <?php $articulos = $conexion->query("SELECT sum(total)as totalgeneral FROM $empresa.tbl_art_compras"); 
                    $row = $articulos->fetch_assoc();
                    $TotalGeneral = $row["totalgeneral"];
                    ?>
                    <input type="number" name="total_general" class="form-control"  placeholder="total" id="total_G" value =  <?php echo $TotalGeneral ?>  readonly>
                </div>
            </div>

            <label for="inputState">Datos del proveedor: </label><br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <select id="" name="nombre_proveedor" class="form-control" placeholder="nombre y apellido del proveedor">
                        <?php $suplidores = $conexion->query("SELECT nombre_sup FROM $empresa.tbl_suplidores"); 
                        while($row = $suplidores->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre_sup"];  ?> ><?php echo $row["nombre_sup"];  ?></option>
                        <?php } ?>

                    </select> 
                </div>
                <div class="form-group col-md-6">
                <input type="number" name="cod_proveedor" placeholder ="cod proveedor" class="form-control" readonly>
                </div>
            </div>

            <!--impuestos-->
            <!--
            <label for="inputState">Datos de los Impuestos: </label><br>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="number" min = 1 name="cod_impuesto" class="form-control"  placeholder="Cod impuesto" >
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="" class="form-control"  placeholder="nombre impuesto" >
                </div>
                <div class="form-group col-md-3">
                    <input type="number" name="" class="form-control"  placeholder="valor impuesto" >
                </div>
                <div class="form-group col-md-3">
                    <input type="number" name="comprobante" class="form-control"  placeholder="Comprobante" >
                </div>
            </div>
            -->
            <label for="inputState">Datos de los productos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select id="articulo" name="articulo" class="form-control" placeholder="articulo">
                        <?php $articulos = $conexion->query("SELECT nombre FROM $empresa.tbl_articulos"); 
                        while($row = $articulos->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre"];  ?> ><?php echo $row["nombre"];  ?></option>
                        <?php } ?>

                    </select> 
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState">Precio Compra:</label>
                    <input type="number" name="precio_compra" class="form-control" id ="precio_compra" placeholder="precio compra" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Cantidad:</label>
                    <input type="number" min = 1 name="cantidad" class="form-control"  placeholder="cantidad" id="cantidad">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Itebis:</label>
                    <input  name="impuestodf" class="form-control"  placeholder="impuesto" id ="impuesto">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Stock:</label>
                    <input type="number" name="stock" class="form-control"  placeholder="Stock" id ="stock" readonly>
                </div>
                
            </div>
            <div class="form-row">                           
                <div class="form-group col-md-3">
                    <label for="inputState">Total con Impuestos:</label>
                    <input type="number" name="valor_impuestos" class="form-control"  placeholder="total con impuestos" id="total_I" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Total sin Impestos:</label>
                    <input type="number" name="sin_impuestos" class="form-control"  placeholder="total sin impuestos" id="total_SI" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Total:</label>
                    <input type="number" name="total" class="form-control"  placeholder="total" id="total" readonly>
                </div>
                
            </div>

            <div class="form-row">
                
                <div class="form-group col-md-12">
                    <label for="inputState">Descripcion:</label>
                    <textarea name="nota" class="form-control" cols="50" rows="3" placeholder = "Descripcion" id="descripcion"></textarea>
                </div>
                
            </div>

            <div class="form-row">
                
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn">Pasar compra</button>
                </div>
            </div>
            

            <!--Aqui va la tabla temp de compras-->
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
                            if(isset($_GET["id_temp"]))
                            {
                                    //$id=$_GET["id_temp"];
                                    $consulta_art_temp = $conexion->query("select * from $empresa.tbl_compras where no_compra= $no_compra");
                            }else
                            {
                                $consulta_art_temp = $conexion->query("select * from $empresa.tbl_art_compras where no_compra = $no_compra limit 5");
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

            
            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar esta compra 
            </label>
            <br>
            <a href="../../scripts/compras/borrar_id_temporal.php" id="btn" class="btn btn" >registrar compra</a>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
        </form>

<!--Aqui el final de los div de este formulario-->
    </div>    
</div>


    
<script>
$(document).ready(function(){

    $("#impuesto").keyup(function() {
      //alert("hol");
      var var_porcentaje = (parseFloat($("#impuesto").val()) / 100); //0.08
      var var_total_SI = parseFloat($("#total_SI").val()); //80
      var var_porciento = var_total_SI * var_porcentaje; //80 * 0.08 = 6.4
      //var var_gananciaAnt = parseFloat($("#ganancia").val()); //40
      var var_ganancia = var_total_SI + var_porciento; //40 + 6.4 = 46.4
      $("#total_I").val(var_ganancia);
    });

});
</script>