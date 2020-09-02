<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/compras.css">
<div class="container-compras">
    <div class="container form-row">
        <form id="form"  action="../../scripts/compras/compras.php" method="POST">
            <div class="cabeza">
               <h2> Registro de Compras</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="no_compra" placeholder ="No. de compra" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="date" name="fecha_orden" placeholder = date(d/m/a) class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <input type="time" name="hora" placeholder ="hora" class="form-control" >
                </div>
            </div>

            <label for="inputState">Datos del proveedor: </label><br>
            <div class="form-row">
                <input type="text" name="suplidor" placeholder ="nombre y apellido del proveedor" class="form-control" >
                <br><br>
                <input type="number" name="direccion" placeholder ="Dirección" class="form-control col-md-4" >
                <input type="tel" name="tel_proveedor" placeholder ="telefono" class="form-control col-md-4" >
                <input type="email" name="email_proveedor" placeholder ="@email" class="form-control col-md-4" >
            </div>

            <label for="inputState">Datos de los productos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="articulo" class="form-control" id="inputCity" placeholder="articulo" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="nota" class="form-control" id="inputCity" placeholder="Descripcion" >
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="precio_compra" class="form-control" id="inputCity" placeholder="precio compra" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="number" min = 1 name="cantidad" class="form-control" id="inputCity" placeholder="cantidad" >
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name="valor_total" class="form-control" id="inputCity" placeholder="total" >
                </div>
            </div>

            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar esta compra 
            </label>
            <br>
            <button type="button" id="btn" class="btn btn">registrar compra</button>
            <br>
            <br>
        </form>
    </div>    
</div>