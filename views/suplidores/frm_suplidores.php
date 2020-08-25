<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE SUPLIDORES 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/suplidores.css">
<div class="container-cuentas-por-cobrar">
    <div class="container form-row">
        <form id="form"  action="" method="post">
            <div class="cabeza">
               <h2> Registro de Suplidores</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" placeholder ="Nombre del suplidor" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="codigo" placeholder ="producto" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <input type="text" name="descripcion" placeholder ="Descripción" class="form-control" >
                <br><br>
                <input type="tel" name="referencia" placeholder ="telefono" class="form-control col-md-6" >
            </div>

            <label for="inputState">Datos del producto: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" min = 1 name="codigo_barra" class="form-control" id="inputCity" placeholder="precio" >
                </div>
                <div class="form-group col-md-4">
                    <select id="inputState" class="form-control" name="unidad" placeholder="Unidad">
                            <option selected="">Electricos</option>
                            <option selected="">comestibles</option>
                            <option selected="">bebidas</option>
                            <option selected="">herramientas</option>
                            <option selected="null">Categorias</option>
                    </select>
                </div>
                <select id="inputState" class="form-control col-md-4" name="direciones" placeholder="Direciones">
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
            <button type="button" id="btn" class="btn btn">registrar</button>
            <br>
            <br>
        </form>
    </div>    
</div>