<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
      <!-- js -->
      <link rel="stylesheet" href="../../css/articulos.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="../../scripts/js/time_alert.js"></script>
      <script src="../../scripts/js/articulo.js"></script>
      <!--Cargar codigo suplidores-->
      <script src="../../scripts/articulos/codproarticulos.js"></script>   

<div class="container-articulos">
    <div class="container form-row">

        <form id="form" action="../../scripts/articulos/articulos.php" method="post">

            <div class="cabeza">
            <?php if(isset($_GET["registro"])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>listo! </strong> Nuevo artículo registrado
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
               <h2> Registro de artículos</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputState">Nombre Articulo:</label>
                    <input type="text" name="nombre" placeholder ="" class="form-control">
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Codigo Barra:</label>
                    <input type="text" name="codigo_barra" placeholder ="" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputState">Precio Compra:</label>
                    <input type="number" id="precioCompra" name="precio_compra" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Precio:</label>
                    <input type="number" id="precioVenta" name="precio" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Ganancia:</label>
                    <input id="ganancia" name="ganancia" placeholder ="" class="form-control" readonly>
                </div>
                <div class="form-group col-md-6">
                <label for="inputState">Stock Minimo:</label>
                    <input type="number" name="stop_min" placeholder ="" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                <label for="inputState">Cantidad Actual:</label>
                    <input type="number" name="cantidad_actual" placeholder ="" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputState">Codigo Impuesto:</label>
                    <select id="porcentaje" class="form-control" name="cod_impuesto">
                    <?php $nombre_impuesto = $conexion->query("SELECT nom_codigo, porciento, id_cod_impuesto FROM $empresa.tbl_cod_impuestos"); 
                        while($row = $nombre_impuesto->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["id_cod_impuesto"];  ?> ><?php echo $row["nom_codigo"];  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Unidad:</label>
                    <select id="inputState" class="form-control" name="unidad">
                            <option selected="">libra</option>
                            <option selected="">metro</option>
                            <option selected="">centimetos</option>
                            <option selected="">pulgadas</option>
                            <option selected="">pies</option>
                            <option selected="">galones</option>
                            <option selected="">una media(1/2)</option>
                            <option selected="">una cuarta(1/4)</option>
                            <option selected="null">Unidad</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                <label for="inputState">Categoria:</label>
                    <select id="inputState" class="form-control" name="categoria">
                    <?php $categorias = $conexion->query("SELECT nombre_categoria FROM $empresa.tbl_categorias"); 
                        while($row = $categorias->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre_categoria"];  ?> ><?php echo $row["nombre_categoria"];  ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <label for="inputState">Datos del proveedor </label><br>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <select id="nombre_proveedor" name="nombre_proveedor" class="form-control" placeholder="nombre y apellido del proveedor" >
                        <?php $suplidores = $conexion->query("SELECT nombre_sup FROM $empresa.tbl_suplidores"); 
                        while($row = $suplidores->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre_sup"];  ?> ><?php echo $row["nombre_sup"];  ?></option>
                        <?php } ?>

                    </select> 

                </div>
                
                <div class="form-group col-md-3" >
                        <?php $suplidores = $conexion->query("SELECT * FROM $empresa.tbl_suplidores");
                        $dato = $suplidores->fetch_assoc();
                        ?>
                        <input type="number" id="cod_proveedor" name="cod_proveedor" value = "<?php echo $dato["codigo_sup"]; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-row">
            <label for="inputState">Descripcion</label>
                <div class="form-group col-md-12">
                    <textarea name="nota" class="form-control" cols="50" rows="3" placeholder = "Descripcion"></textarea>
                </div>
            </div>
            

            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo artículo 
            </label>
            <br>
            <br>
            <input type="submit" id="btn" class="btn btn" value="Registrar articulo" >
            <br>
        </form>
    </div>    
</div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->

