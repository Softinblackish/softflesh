<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/compras.css">
<div class="container-compras">
    <div class="container form-row">
        <form id="form"  action="" method="post">
            <div class="cabeza">
               <h2> Registro de Compras</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="nombre" placeholder ="No. de compra" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo" placeholder ="fecha" class="form-control" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo" placeholder ="hora" class="form-control" >
                </div>
            </div>

            <label for="inputState">Datos del proveedor: </label><br>
            <div class="form-row">
                <input type="text" name="descripcion" placeholder ="nombre del proveedor" class="form-control" >
                <br><br>
                <input type="number" name="referencia" placeholder ="Dirección" class="form-control col-md-6" >
            </div>

            <label for="inputState">Datos de los productos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="nombre" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="Descripcion" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="precio compra" >
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="cantidad" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="total" >
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