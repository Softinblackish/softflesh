<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/style.css">    
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
  <!---------------------    Articulos   ------------------------------------------>

<?php include("../base/base.php"); ?>

    <div id="contenido"  >
        <div><img id="img-menu-responsive"src="img/img-menu-responsive.png" width="50" height="50" alt=""></div>
        <div id="contenido2">
           
           <div id="contenido-articulos">
                 <div id="agregar-articulo" class="menu-articulos" >Nuevo artículo</div> <br>
                 <div id="reportes-articulos" class="menu-articulos" >Reportes</div> <br>
                 <div id="lista-articulos" class="menu-articulos" >Artículos</div> <br>
                 <!--
                 <div id="lista-articulos" class="menu-articulos" >Cuentas Por Cobrar</div> <br>
                 <div id="lista-articulos" class="menu-articulos" >Cuentas Por Pagar</div> <br>-->
           </div>
        </div>   

    <!------------------------Lista de articulos ----------------------------------------->

        <table id="tabla-articulos" style=" position: absolute; top: 200px; width: 78%; margin-left: 10px; display: none;" class="table table-striped table-dark">
            <thead>
              <tr style="background-color:#00AAE4 ;">
                <th scope="col" style="width:5%" >Código</th>
                <th scope="col"style="width:8%">Nombre</th>
                <th class="des" scope="col"style="width:8%">Descripción</th>
                <th class="cate" scope="col"style="width:5%">Catergoria</th>
                <th scope="col"style="width:5%">Acción</th>
              </tr>
            </thead>
            <tbody>
            <?php
            include("../../scripts/conexion/cone.php");

            $query= $conexion->query("Select * from articulos");

            while($row= $query->fetch_assoc())
            {
            ?>
              <tr>
                <td><?php echo $row['codigo'] ?></td>
                <td><?php echo $row['nombre'] ?></td>
                <td class="des"><?php echo $row['descripcion'] ?></td>
                <td class="cate"><?php echo $row['categoria'] ?></td>
                <td><a href="../../scripts/articulos/eliminar.php?id=<?php echo $row['id_articulo'];?>"><button class="btn btn-danger"><img src="../../img/img-borrar.png" width="20" height="20" alt=""></button></a> <a href="articulos.php?id=<?php echo $row['id_articulo']  ?>"><button id="modificar" style="margin-left: 5px;" class="btn btn-warning"><img src="../../img/img-editar.png" width="20" height="20" alt=""></button></a></td>
              </tr>
              <?php
            }
              ?>
            </tbody>
          </table>



            <!------------------------ final de la Lista de articulos ----------------------------------------->


    </div>




            <!----------------------------Formulario nuevo articulo------------------------------>
    <div id="Form-new-article" style="width: 40%; float: left; margin-left: 20%; margin-top:80px;">
      <form method="POST" action="../../scripts/articulos/articulos.php">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre del artículo</label>
            <input type="text" class="form-control" placeholder="Nombre del artículo" name="nombre">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Código</label>
            <input type="text" class="form-control" placeholder="Codigo del articulo" name="codigo">
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Descripción</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Descripción del articulo" name="descripcion">
        </div>
        <div class="form-row">
            <div class="col-md-6">
          <label for="inputAddress2" >Referencia</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Eje; AF54DF5W5E151FEW51ER1-1WER15W" name="referencia">
          </div>
    
            <div class="col-md-6">
          <label for="inputAddress2">Código de mpuestos</label>
          <select id="inputState" class="form-control" name="impuesto">
             <?php 
             $select_cod = $conexion->query("SELECT * FROM cod_impuestos");
             while($cod = $select_cod->fetch_assoc() )
             {
               ?>
              <option value="<?php echo $cod['id_cod_impuesto']; ?>"><?php echo $cod["nom_codigo"]; ?></option>
               <?php
             }
             
             ?>
          
            </select>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Código de barra</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Eje; 0000215EE150" name="codigo_barra">
          </div>
          
          <div class="form-group col-md-4">
            <label for="inputState">Categoría</label>
            <select id="inputState" class="form-control" name="categoria">
              <option selected>Electricos.</option>
              <option>comestibles</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Almacen</label>
            <select id="inputState" class="form-control" name="almacen">
              <option selected>01-Santiago</option>
              <option>02-La vega</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label" for="gridCheck">Haga click en guardar para registrar este nuevo artículo
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
    </div>



              <!-----------------Fin de formulario de nuevo articulo-->

            <!----------------------------Formulario modificar articulo------------------------------>
            <?php 
            if(isset($_GET['id']))
            {
          
            $id_update = $_GET['id'];
                $articulo_id= $conexion->query("select * from articulos where id_articulo= $id_update");
               
                while($row2 = $articulo_id->fetch_assoc())
                {

              
            ?><script>
             $(document).ready(function(){
               $("#Form-update-article"). show();
               $("#Form-new-article").hide();

});</script>
            
            <div id="Form-update-article" style="width: 40%; float: left; margin-left: 20%; margin-top:80px;  display:none">
      <form method="POST" action="../scripts/articulos/modificar.php">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nombre del artículo</label>
            <input type="text" class="form-control" placeholder="Nombre del artículo" name="nombre" value="<?php echo $row2["nombre"] ?>">
          </div>
          <input type="hidden" value ="<?php echo $row2["id_articulo"] ?>" name="id">
          <div class="form-group col-md-6">
            <label for="inputPassword4">Código</label>
            <input type="text" class="form-control" placeholder="Codigo del articulo" name="codigo" value="<?php echo $row2["codigo"] ?>" disabled=disabled>
          </div>
        </div>
        <div class="form-group">
          <label for="inputAddress">Descripción</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Descripción del articulo" name="descripcion" value="<?php echo $row2["descripcion"] ?>">
        </div>
        <div class="form-group">
          <label for="inputAddress2">Referencia</label>
          <input type="text" class="form-control" id="inputAddress2" placeholder="Eje; AF54DF5W5E151FEW51ER1-1WER15W" name="referencia" value="<?php echo $row2["referencia"] ?>">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCity">Código de barra</label>
            <input type="text" class="form-control" id="inputCity" placeholder="Eje; 0000215EE150" name="codigo_barra" value="<?php echo $row2["codigo_barra"] ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="inputState">Categoría</label>
            <select id="inputState" class="form-control" name="categoria" value="<?php echo $row2["categoria"] ?>">
              <option selected>Electricos.</option>
              <option>comestibles</option>
            </select>
          </div>
          <div class="form-group col-md-2">
            <label for="inputZip">Almacen</label>
            <select id="inputState" class="form-control" name="almacen" value="<?php echo $row2["almacen"] ?>">
              <option selected>01-Santiago</option>
              <option>02-La vega</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <label class="form-check-label" for="gridCheck">Haga click en guardar para registrar este nuevo artículo
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </form>
    </div>
                <?php } } ?>

            <!---------fin modificar articulos-------->




              <!-------------------reportes de articulos-->
    <div id="lista-reportes-articulos" style="display: none;">
      <div>
      <table  style=" position: absolute; top: 200px; width: 48%; margin-left: 20.5%;" class="table table-striped table-dark">
        <thead>
          <tr>
            <td>Lorem Ipsum is simply dummy text of the printing a</td>
           </tr>

          <tr>
            <td>nd typesetting industry. Lorem Ipsum has been the industry's standard du-0002</td>
           
          </tr>
          <tr>
            <td>mmy text ever since the 1500s, when an unknown printer took a</td>
           </tr>
           
          <tr>
            <td>galley of type and scrambled it to make a type specimen book. </td>
           
          </tr>
          <tr>
            <td>It has survived not only five centuries, but also the leap</td>
           </tr>
           <tr>
            <td>Lorem Ipsum is simply dummy text of the printing a</td>
           </tr>

          <tr>
            <td>nd typesetting industry. Lorem Ipsum has been the industry's standard du-0002</td>
           
          </tr>
          <tr>
            <td>mmy text ever since the 1500s, when an unknown printer took a</td>
           </tr>
           
          <tr>
            <td>galley of type and scrambled it to make a type specimen book. </td>
           
          </tr>
          <tr>
            <td>It has survived not only five centuries, but also the leap</td>
           </tr>
           <tr>
            <td>Lorem Ipsum is simply dummy text of the printing a</td>
           </tr>

          <tr>
            <td>nd typesetting industry. Lorem Ipsum has been the industry's standard du-0002</td>
           
          </tr>
          <tr>
            <td>mmy text ever since the 1500s, when an unknown printer took a</td>
           </tr>
           
          <tr>
            <td>galley of type and scrambled it to make a type specimen book. </td>
           
          </tr>
          <tr>
            <td>It has survived not only five centuries, but also the leap</td>
           </tr>
           
          
        </tbody>
      </table>
      
    </div>
      <div id="Form-new-article" style="width: 20%; float:right; margin-right: 50px; margin-top:110px;">
        <form method="POST" action="scripts/articulos.php">
          FILTROS 
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="email" class="form-control" placeholder="Desde">
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" placeholder="Hasta">
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="inputAddress" placeholder="Código">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="inputAddress2" placeholder="Nombre">
          </div>
            <div class="form-group col-md-8" style="margin-left: -15px;" >
              
              <select id="inputState" class="form-control">
                <option>Electricos</option>
                <option>comestibles</option>
              </select>Almacen
              <select id="inputState" class="form-control">
                <option selected>01-Santiago</option>
                <option>02-La vega</option>
              </select>
            </div>
         

            <div class="form-group col-md-4"style="float: left;" >
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          
        </form>
      </div>

    </div>
