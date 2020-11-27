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
<h2>Listado de devoluciones</h2>
<form action="" method="post">
    <div class="form-row">
        <div class="form-group col-md-4">
        <label>Desde</label>
            <input class="form-control"  type="date" name="desde">
        </div>
        <div class="form-group col-md-4" >
            <label>Hasta</label>
            <input class="form-control"  type="date" placeholder="Buscar" name="hasta">
        </div>
       
        <div class="form-group col-md-2">
            <label>Num. factura</label>
            <input class="form-control"  type="number" placeholder="Factura" name="filtro">
        </div>
        <div class="form-group col-md-2">
        <label>.</label>
            <input type="submit" class="btn btn form-control" id="buscar" value="Buscar">
        </div>
    </div>
</form>
     <br><br>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Nota de crédito</th>
      <th scope="col" width="20%">Comprobante</th>
      <th scope="col">Comprobante factura</th>
      <th scope="col">Fecha</th>
      <th scope="col">Ver</th>
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
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
        }

        if( $_POST["desde"])
        {
            $desde = $_POST["desde"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito WHERE fecha_creacion >= '$desde' ");
        }

        if($_POST["hasta"] )
        {
            $hasta = $_POST["hasta"];   
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito WHERE fecha_creacion <= '$hasta' ");
        }

        if( $_POST["filtro"])
        {
            $filtro = $_POST["filtro"];
            $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito WHERE id_nota_credito = $filtro ");
        }
    }
    else{
        $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_nota_credito");
    }
    $test = $lista_venta->num_rows;
    echo $test;
    while($row = $lista_venta->fetch_assoc())
        { 
           ?>
            <tr>
                <th scope="row"><?php echo $row["id_nota_credito"]; ?></th>
                <td><?php echo $row["comprobante"]; ?></td>
                <td><?php echo $row["comprobante_factura"]; ?></td>
                <td><?php echo $row["fecha_creacion"]; ?></td>
                <td>
                    <?php if($permisos['modificar_user']== 1)
                        {
                    ?>
                        <a id="cerrar"  class="btn btn-info" data-toggle="modal" data-target="#example<?php echo $row["id_venta"]; ?>" > <i class="fa fa-eye fa-lg"></i></a>
                    <?php 
                        } 
                    ?>
                </td>
            </tr>
                 <!--Modal editar devolucion   --->
                <div class="modal fade" id="example<?php echo $row["id_venta"];?>" tabindex="-1" aria-labelledby="example<?php echo $row["id_venta"];?>Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#17a2b8; color:white;">
                                <h5 class="modal-title" id="example<?php echo $row["id_venta"];?>Label">
                                    Factura:<?php echo $row["id_venta"]; ?>
                                </h5>
                                <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                                    <input type="hidden" name="fac" id="fac" value="<?php echo $row["id_venta_temp"]; ?>">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario devolucion   --->
                                <form action="../../scripts/ventas/devolucion.php" method="post">
                                    <div class="form-row">
                                        <div class="form-group col-md-12"> 
                                            <Strong> 
                                                <label style="float:left;">Artículos</label> <br>
                                            <hr>
                                            <?php
                                                $id_temp = $row['id_nota_credito'];
                                                $consulta_articulos = $conexion->query("SELECT id_articulo, id_venta, articulo, cantidad FROM $empresa.tbl_venta_temp where id_venta = $id_temp");
                                                while($list_articulos = $consulta_articulos->fetch_assoc())
                                                {
                                                    echo $list_articulos['articulo'];
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                                        <input type="submit" class="btn btn-primary" value="Registrar devolución">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            ?>
  </tbody>
</table>

