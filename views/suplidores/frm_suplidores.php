<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE SUPLIDORES 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/suplidores.css">
<script src="../../scripts/js/time_alert.js"></script>
<div class="container-cuentas-por-cobrar">
    <div class="container form-row">
        <form id="form" action="../../scripts/suplidores/suplidores.php" method="post">
            <div class="cabeza">
                <?php if(isset($_GET["registro"])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>listo! </strong> Nuevo Suplidor registrado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
               <h2> Registro de Suplidores</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre_sub" placeholder ="Nombre del suplidor" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="articulo" placeholder ="producto" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                <input type="text" name="descripcion_sub" placeholder ="Descripción" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                <input type="tel" name="telefono" placeholder ="telefono" class="form-control" >
                </div>
            </div>

            <label for="inputState">Datos del producto: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" min = 1 name="precio" class="form-control"  placeholder="precio" >
                </div>
                <div class="form-group col-md-4">
                    <select id="inputState" class="form-control" name="unidad" placeholder="unidad">
                            <option selected="">Electricos</option>
                            <option selected="">comestibles</option>
                            <option selected="">bebidas</option>
                            <option selected="">herramientas</option>
                            <option selected="null">Categorias</option>
                    </select>
                </div>
                <select id="inputState" class="form-control col-md-4" name="direccion" placeholder="Direciones">
                        <option selected="">Santo Domingo</option>
                        <option selected="">La vega</option>
                        <option selected="">Santiago</option>
                        <option selected="">La romana</option>
                        <option selected="">San cristobal</option>
                        <option selected="">La altagracia</option>
                        <option selected="">higuey</option>
                        <option selected="">jarabacoa</option>
                        <option selected="null">Direciones</option>
                </select>
            </div>

            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo artículo 
            </label>
            <br>
            <button type="submit" id="btn" class="btn btn">registrar</button>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
            <br>
        </form>
    </div>    
</div>