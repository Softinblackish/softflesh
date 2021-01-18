<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE CARGAR ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
      <!-- js -->
      <link rel="stylesheet" href="../../css/cargar_articulos.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="../../scripts/js/time_alert.js"></script>
      <script src="../../scripts/js/articulo.js"></script>
      <!--Cargar codigo suplidores-->
      <script src="../../scripts/articulos/codproarticulos.js"></script>   

<div class="container-articulos">
    <div class="container form-row">

        <form id="form" action="../../scripts/articulos/cargar_articulos.php" method="post">

            <div class="cabeza">
            <?php if(isset($_GET["registro"])){ ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <strong>listo! </strong> Nuevo artículo registrado
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
               <h2> Carga de artículos</h2>
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
                <div class="form-group col-md-6">
                <label for="inputState">Precio:</label>
                    <input type="number" id="precioVenta" name="precio" placeholder ="" class="form-control" >
                </div>
                
                <div class="form-group col-md-6">
                <label for="inputState">Cantidad:</label>
                    <input type="number" name="cantidad_actual" placeholder ="" class="form-control" >
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

