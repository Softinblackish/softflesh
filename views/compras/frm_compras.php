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
                <input type="tel" name="tel_proveedor" placeholder ="telefono" class="form-control" >
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
            </div>

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