<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
      <?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="" method="post">
            <div class="cabeza">
               <h2> Registro de artículos</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" placeholder ="Nombre del artículo" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="codigo" placeholder ="Código" class="form-control" >
                </div>
            </div>

            <div class="form-row">
                <input type="text" name="descripcion" placeholder ="Descripción" class="form-control" >
                <br><br>
                <input type="text" name="referencia" placeholder ="Referencia" class="form-control col-md-6" >
            </div>

            <label for="inputState">Codigo de Impuestos: </label><br>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="Eje; 0000215EE150" >
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
                <select id="inputState" class="form-control col-md-4" name="almacen">
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
            <button type="button" id="btn" class="btn btn">Success</button>
            <br>
            <br>
        </form>
    </div>    
</div>