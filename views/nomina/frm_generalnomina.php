<!--  AQUI DEBE DE IR SOLAMENTE UN FORMULARIO DE REGISTRO DE nominaS
      SOLO HTML SIN CSS SIN JAVASCRIP SIN PHP-->

      <!-- php -->
      <?php include("../base.php");
            include("../../scripts/conexion/cone.php"); ?>
      <!-- css -->
        <link rel="stylesheet" href="../../css/reporte_nomina.css">
        <link rel="stylesheet" href="../../css/scroll.css">
      <!-- js -->


<div class="container-devoluciones">
    <div class="container form-row">

    <form action="" method="post">
        <div class="cabeza">
                <h2> Nomina </h2>
        </div>
        <div class="form-row">
        <!--
            <div class="form-group col-md-3">
            <label>Desde</label>
                <input class="form-control"  type="date" name="desde">
            </div>
            <div class="form-group col-md-3" >
                <label>Hasta</label>
                <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
            </div>
            <div class="form-group col-md-2">
                <label>Num. factura</label>
                <input class="form-control"  type="number" placeholder="Factura" name="filtro">
            </div>-->
            <div class="form-group col-md-12">
            <!--<label>.</label>-->
                <input type="submit" class="btn btn form-control" id="buscar" value="Generar nomina">
            </div>
            <div class="form-group col-md-1">
              
            </div>
        </div>
    </form> 
                
                    <table class="table">
                    <h5 class="cabeza_tabla" >Generacion de la nomina</h5>
                        <thead class="thead">      
                            
                        <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width:20%;">Fecha</th>
                                <th scope="col" style="width:30%;"> Nombre </th>
                                <th scope="col" style="width:10%;"> Sueldo </th>
                                <th scope="col" style="width:10%;"> Descuento </th>
                                <th scope="col" style="width:10%;"> Total </th>
                                <!--<th scope="col" style="width:60%;"> Accion </th>-->
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $empresa = $_SESSION["empresa_db"];  
                            $generarNomina = $conexion->query("SELECT * FROM $empresa.tbl_nomina");
                                if($generarNomina->num_rows >= 1 ) {    
                                    while($row = $generarNomina->fetch_assoc())
                                        {
                            ?>
                                                <!-- Head Tabla nominas   --->
                                                <tr>
                                                    <th scope="row"><?php echo $row["no_nomina"]; ?></th>
                                                    <td><?php echo $row["fecha_creacion"]; ?></td>
                                                    <td><?php echo $row["empleado"]; ?></td>
                                                    <td><?php echo $row["sueldo"]; ?></td>
                                                    <td><?php echo $row["salud"]; ?></td>
                                                    <td><?php echo $row["sueldo"]; ?></td>
                                                </tr>


                            <?php
                                        }
                                    }else{}
                            ?>
                        </tbody>
                    </table> 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <a href="../nominas/frm_nominas.php" id="buscar" class="btn btn" >
                            Volver atras
                            </a>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="rpt_nominas.php?desde=<?php echo $desde; ?> &hasta=<?php echo $hasta;?>
                            &filtro=<?php echo $filtro; ?> ">
                                <input type="" class="btn btn form-control" id="buscar" value="Imprimir" readonly>
                            </a> 
                            
                        </div>

                    </div> 
                

        </div>
        
    </div>