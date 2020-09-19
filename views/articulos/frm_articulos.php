<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
      <!-- js -->
      <link rel="stylesheet" href="../../css/articulos.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
      <script src="../../scripts/js/time_alert.js"></script>

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
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" placeholder ="Nombre del artículo" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="codigo_barra" placeholder ="Código Barra" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                <input type="text" name="descripcion" placeholder ="Descripción" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                <input type="number" name="precio" placeholder ="precio" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                <input type="number" name="stop_min" placeholder ="Stop minimo" class="form-control" >
                </div>
            </div>

            <label for="inputState">Codigo de Impuestos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="cod_impuesto" class="form-control"  placeholder="Eje; 0000215EE150" >
                </div>
                <div class="form-group col-md-4">
                    <select id="inputState" class="form-control" name="categoria">
                            <option selected="">Electricos</option>
                            <option selected="">comestibles</option>
                            <option selected="">bebidas</option>
                            <option selected="">herramientas</option>
                            <option selected="null">categoria</option>
                    </select>
                </div>
                <select id="inputState" class="form-control col-md-4" name="unidad">
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

