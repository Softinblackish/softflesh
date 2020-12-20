<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE COMPRAS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php"); ?>
        <?php include("../../scripts/compras/compras_general_id_temp.php"); 
            $id_nueva_compra = $conexion->query("SELECT no_nomina FROM $empresa.tbl_nomina_id_temp");
            $id_temp = $id_nueva_compra->fetch_assoc();
            $no_compra = $id_temp["no_nomina"];
        ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/compras.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->
        <script src="../../scripts/compras/articulosCompras.js"></script>
        <script src="../../scripts/js/time_alert.js"></script>
        


<div class="container-compras">
    <div class="container form-row">
        <form id="form" action="../../scripts/nomina/nomina.php" method="post">
            <div class="cabeza">
                <?php if(isset($_GET["registro"])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>listo! </strong> Nueva Compra registrada
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>
               <h2> Nominas de Empleados</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputState">No de nomina:</label>
                    <input type="" name="no_nomina"  placeholder ="no de nomina" value = <?php echo $no_compra ?> class="form-control">
                </div>
                
                
                <div class="form-group col-md-3">
                    <label for="inputState">Nombre Empleado:</label>
                    <select name="empleado" class="form-control" cajeros>
                    <?php $user = $conexion->query("SELECT nombre_usuario FROM $empresa.tbl_usuario"); 
                        while($row = $user->fetch_assoc()) {
                        ?>
                        <option value = <?php echo $row["nombre_usuario"];  ?> ><?php echo $row["nombre_usuario"];  ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Salario Base:</label>
                    <input type="number"  min="0" name="salario_base" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Salario Dia:</label>
                    <input type="number" name="salario_dia" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Salario hora:</label>
                    <input type="number" name="salario_hora" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Horas Extras:</label>
                    <input type="number" name="horas_extras" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Departamento:</label>
                    <input type="" name="departamento" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Puesto:</label>
                    <input type="" name="puesto" class="form-control" value = "" >
                </div>
            </div>

            <label for="inputState">Datos laborales del Empleado </label><br>
            <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="inputState">Dias laborables:</label>
                    <select name="dias_laborables" class="form-control" cajeros>
                        <option value ="">lunes-viernes</option>
                        <option value ="">fines de semana</option>
                        <option value ="">1-3 dias a la semana</option>
                        <option value ="">1-5 dias a la semana</option>
                        <option value ="">lunes-Domingo</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">turno:</label>
                    <select name="turno" class="form-control" cajeros>
                        <option value ="">Dia completo</option>
                        <option value ="">mañana</option>
                        <option value ="">Talde</option>
                        <option value ="">Noche</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Pension:</label>
                    <input type="number" name="pension" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Salud:</label>
                    <input type="" name="salud" class="form-control" value = "" >
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="inputState">Salario Vacaciones:</label>
                    <input type="number" name="vacaciones" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">total Cesantia:</label>
                    <input type="number" name="cesantia" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">total ARS:</label>
                    <input type="number" name="ars" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">sueldo:</label>
                    <input type="number" name="sueldo" class="form-control" value = "" >
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-3">
                    <label for="inputState">Percepciones:</label>
                    <select name="percepciones" class="form-control" cajeros>
                        <option value ="">Viaticos</option>
                        <option value ="">Gasolina</option>
                        <option value ="">extra</option>
                        <option value ="">Bonos</option>
                        <option value ="">Ninguno</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Total:</label>
                    <input type="number" name="total_percepcion" class="form-control" value = "" >
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Deduciones:</label>
                    <select name="deduciones" class="form-control" cajeros>
                        <option value ="">imp. s/p A trabajo </option>
                        <option value ="">Imss</option>
                        <option value ="">ahorro</option>
                        <option value ="">Deuda</option>
                        <option value ="">otros</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Total:</label>
                    <input type="number" name="total_deduciones" class="form-control" value = "" >
                </div>
            </div>

            
            
            <!--Aqui se pasan las compras-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn">Pasar compra</button>
                </div>
            </div>
            

            <!--Aqui va la tabla temp de compras-->
            <div class="tamano_tablas Overflow">
                <table class="table">
                    <h5 class="cabeza_tabla" >Registro nomina</h5>
                    <thead>      
                        
                        <tr>
                            <th scope="col" style="width:60%;"> Nombre </th>
                            <th scope="col" style="width:25%;"> Salario Base </th>
                            <th scope="col" style="width:15%;"> Departamento </th>
                            <th scope="col" style="width:10%;"> Puesto </th>
                            <th scope="col" style="width:15%;"> Turno </th>
                            <th scope="col" style="width:15%;"> Borrar </th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET["id_temp"]))
                            {
                                    //$id=$_GET["id_temp"];
                                    $consulta_art_temp = $conexion->query("select * from $empresa.tbl_compras where no_compra= $no_compra");
                            }else
                            {
                                $consulta_art_temp = $conexion->query("select * from $empresa.tbl_art_compras where no_compra = $no_compra");
                            }    
                            while($reg_art_temp = $consulta_art_temp->fetch_assoc())
                                    {
                        ?>
                                            <tr>
                                            <th><?php  echo $reg_art_temp["articulo"]; ?></th>
                                            <td><?php  echo $reg_art_temp["cantidad"]; ?></td>
                                            <td><?php  echo $reg_art_temp["precio_compra"]; ?></td>
                                            <td><?php  echo $reg_art_temp["itbis"]; ?></td>
                                            <td><?php  echo $reg_art_temp["total"]; ?></td>
                                            <td><a href="../../scripts/compras/borrarArtCompras.php?id_compra=<?php echo $reg_art_temp['id_compra']; ?>&no_compra=<?php echo $reg_art_temp['no_compra']; ?>" class="btn btn-danger"><i class="fa fa-times fa-lg"></i></a></td> 
                                            </tr>
                        <?php
                                    }
                        ?>
                    </tbody>
                </table> 
            </div>

            
            <label class="form-check-label" for="gridCheck">
                    Haga click en guardar para registrar esta compra 
            </label>
            <br>
            <a href="../../scripts/compras/_id_temporal.php" id="btn" class="btn btn" >registrar compra</a>
            <a href="../administracion/administracion.php" id="btn" class="btn btn" >Volver atras</a>
            <br>
        </form>

<!--Aqui el final de los div de este formulario-->
    </div>    
</div>


    
