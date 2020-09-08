<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
      <link rel="stylesheet" href="../../css/compras.css">
<script src="../../scripts/js/time_alert.js"></script>
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
                    <input type="number" name="no_compra" placeholder ="No. de compra" class="form-control">
                </div>
                <div class="form-group col-md-5">
                    <input type="date" name="fecha_orden" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <input type="time" name="hora" class="form-control" >
                </div>
            </div>

            <label for="inputState">Datos del proveedor: </label><br>
            <div class="form-row">
                <div class="form-group col-md-12">
                <input type="text" name="nombre_proveedor" placeholder ="nombre y apellido del proveedor" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                <input type="text" name="direccion_proveedor" placeholder ="Dirección" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                <input type="tel" name="tel_proveedor" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder ="telefono" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                <input type="email" name="email_proveedor" placeholder ="@email" class="form-control" >
                </div>
            </div>

            <label for="inputState">Datos de los productos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="articulo" class="form-control"  placeholder="articulo" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="nota" class="form-control"  placeholder="Descripcion" >
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="precio_compra" class="form-control"  placeholder="precio compra" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" min = 1 name="cantidad" class="form-control"  placeholder="cantidad" >
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="valor_total" class="form-control"  placeholder="total" >
                </div>
                <div class="form-group col-md-4">
                <button type="submit" class="btn btn">Pasar compra</button>
                </div>
            </div>

            

            <!--Aqui va la tabla temp de compras-->
            <table class="table">
                <h5 style="padding:15px; background-color:#882f88;color:white;" >Artículos ingresados</h5>
                <thead>      
                    
                    <tr>
                        <th scope="col" style="width:60%;">Artículos</th>
                        <th scope="col" style="width:8%;">Cantidad</th>
                        <th scope="col" style="width:15%;"> Precio </th>
                        <th scope="col" style="width:15%;"> Total </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        if(isset($_GET["id_temp"]))
                        {
                                $id=$_GET["id_temp"];
                                $cons_art_temp = $conexion->query("select * from $empresa.compra_temp where id_venta= $id");
                                while($reg_comp_temp = $cons_comp_temp->fetch_assoc())
                                {
                                    ?>
                                        <tr>
                                        <th><?php  echo $reg_art_temp["articulo"]; ?></th>
                                        <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                                        <td><?php  echo $reg_art_temp["precio"]; ?></td>
                                        <td><?php  echo $reg_art_temp["total"]; ?></td>
                                        <td><a href="../../scripts/ventas/eliminar_arti_temp.php?id_articulo=<?php echo $reg_art_temp['id_art_temp']; ?> && id_temp=<?php echo $id; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                        </tr>
                                    <?php
                                }
                        }  
                    ?>
                </tbody>
            </table> 



            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar esta compra 
            </label>
            <br>
            <button type="submit" id="btn" class="btn btn">registrar compra</button>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
            <br>
        </form>
    </div>    
</div>