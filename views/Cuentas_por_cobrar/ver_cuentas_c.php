<?php include("../base.php");
?>
<script>

</script>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<script src="../../scripts/js/devolucion_articulos.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>



<div id="box_lista" class="buscar">
    <h2>Cuentas por cobrar</h2>
    <form action="" method="post">
        <div class="row">
            <div class="col-md-3">
                <label>Desde</label>
                <input class="form-control"  type="date" name="desde">
            </div>
        <div class="col-md-3" >
            <label>Hasta</label>
            <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
        </div>
        <div class="col-md-3">
            <label>Num. Prestamo</label>
            <input class="form-control"  type="number" placeholder="Factura" name="filtro">
        </div>
        <div class="col-md-3">
            <label>.</label>
            <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
        </div>
    </div>
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col"> ID CxC</th>
      <th scope="col" width="20%">Cliente</th>
      <th scope="col">Fecha</th>
      <th scope="col">Valor</th>
      <th scope="col">Origen</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $empresa = $_SESSION["empresa_db"];
    
    if(isset($_POST["desde"], $_POST["hasta"] , $_POST["filtro"]))
    {
        if( $_POST["desde"] and $_POST["hasta"] )
        {
            $desde = $_POST["desde"];
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_c WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
        }

        if( $_POST["desde"])
        {
            $desde = $_POST["desde"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_c WHERE fecha_creacion >= '$desde' ");
        }

        if($_POST["hasta"] )
        {
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_c WHERE fecha_creacion <= '$hasta' ");
        }

        if( $_POST["filtro"])
        {
            $filtro = $_POST["filtro"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_c WHERE id_cuenta_c = $filtro ");
        }
    }
    else{
        $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_c order by id_cuenta_c desc limit 10 ");
    }

    while($row = $lista_venta->fetch_assoc())
        { 
            $cliente = $row['id_cliente'];
            $consulta_clientes = $conexion->query("SELECT * FROM $empresa.tbl_clientes where id_cliente = $cliente");
            $row2 = $consulta_clientes->fetch_assoc();
        ?>
            <!-- Head Tabla usuario   --->
            <tr>
                <th scope="row"><?php echo $row["id_cuenta_c"]; ?></th>
                <td width="20%"><?php echo $row2["nombre_cliente"]; ?></td>
                <td><?php echo $row["fecha_creacion"]; ?></td>
                <td>$<?php echo $row["valor"]; ?></td>
                <td><?php echo $row["origen"]; ?></td>
            </tr>
    <?php
        }
    ?>
  </tbody>
</table>

<!-- Modal -->
