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
                    <input type="text" name="nombre" placeholder ="Nombre del artículo" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" placeholder ="Código Barra" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="number" id="precioCompra" name="precio_compra" placeholder ="precio compra" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <input type="number" id="precioVenta" name="precio_venta" placeholder ="precio venta" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <input id="ganancia" name="ganancia" placeholder ="ganancia" class="form-control" readonly>
                </div>
                <div class="form-group col-md-3">
                    <input type="number" name="stop_min" placeholder ="Stock minimo" class="form-control" >
                </div>
                <div class="form-group col-md-12">
                    <input id="gananciaImp" name="ganancia" placeholder ="ganancia + Impuestos" class="form-control" readonly>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <select id="porcentaje" class="form-control" name="cod_impuesto">
                    <?php $porcentajes = $conexion->query("SELECT porciento FROM $empresa.tbl_cod_impuestos"); 
                        while($row = $porcentajes->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["porciento"];  ?> ><?php echo $row["porciento"];  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
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
                    <select id="inputState" class="form-control" name="categoria">
                    <?php $categorias = $conexion->query("SELECT nombre_categoria FROM $empresa.tbl_categorias"); 
                        while($row = $categorias->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre_categoria"];  ?> ><?php echo $row["nombre_categoria"];  ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <label for="inputState">Datos del proveedor: </label><br>
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
                <div class="form-group col-md-4">
                        <?php $suplidores = $conexion->query("SELECT * FROM $empresa.tbl_suplidores");
                        $dato = $suplidores->fetch_assoc();
                        ?>
                        <input type="number" id="cod_proveedor" name="cod_proveedor" value = "<?php echo $dato["codigo_sup"]; ?>" class="form-control" readonly>
                </div>
            </div>

            <div class="form-row">
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
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
        </form>
    </div>    
</div>

<!-- Aqui ira el mensaje de cuando se guarda el art-->

