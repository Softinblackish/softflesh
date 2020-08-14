<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE ARTICULOS 
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->
<?php include("../base.php"); ?>
  
<form  action="" method="post">
    <h1>REGISTRO DE ARTICULOS</h1>
    <input type="text" name="nombre" placeholder ="Nombre del artículo" >
    <input type="text" name="codigo" placeholder ="Código" >
    <input type="text" name="descripcion" placeholder ="Descripción" >
    <input type="text" name="referencia" placeholder ="Referencia" >
    <label for="inputState">Codigo de Impuestos: </label>
    <input type="text" name="codigo_barra" class="form-control" id="inputCity" placeholder="Eje; 0000215EE150" >
    <select id="inputState" class="form-control" name="categoria">
              <option selected="">Electricos.</option>
              <option>comestibles</option>
    </select>
    <select id="inputState" class="form-control" name="almacen">
              <option selected="">01-Santiago</option>
              <option>02-La vega</option>
    </select>
    <label class="form-check-label" for="gridCheck">
            Haga click en guardar para registrar este nuevo artículo
    </label>
    <input type="button" name="Guardar">
</form>    
</div>