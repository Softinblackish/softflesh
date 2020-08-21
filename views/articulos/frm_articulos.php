<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
<link rel="stylesheet" href="../css/articulos.css">

<div class="container-articulos">
    <div class="container form-row">
        <form  action="" method="post">
            <h1>REGISTRO DE ARTICULOS</h1>
            <div class="form-row">
            <input type="text" name="nombre" placeholder ="Nombre del artículo" class="form-control col-md-6">
            <input type="text" name="codigo" placeholder ="Código" class="form-control col-md-6" >
            </div>
            <div class="form-group">
            <input type="text" name="descripcion" placeholder ="Descripción" class="form-control" >
            <input type="text" name="referencia" placeholder ="Referencia" class="form-control col-md-6" >
            </div>
            <label for="inputState">Codigo de Impuestos: </label><br>
            <div class="form-row">
            <input type="text" name="codigo_barra" class="form-control col-md-4" id="inputCity" placeholder="Eje; 0000215EE150" >
            <select id="inputState" class="form-control col-md-4" name="categoria">
                    <option selected="">Electricos.</option>
                    <option>comestibles</option>
            </select>
            <select id="inputState" class="form-control col-md-4" name="almacen">
                    <option selected="">01-Santiago</option>
                    <option>02-La vega</option>
            </select>
            </div>
            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar este nuevo artículo 
            </label>
            <br>
            <button type="button" class="btn btn-success">Success</button>
            <br>
            <br>
        </form>
    </div>    
</div>