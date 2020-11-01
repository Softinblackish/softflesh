<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>
<div id="box_lista" class="buscar">
    <h2>Ventas en espera</h2>
     <br><br>
    <table class="table">
        <thead class="thead">
            <tr>
            <th scope="col">Fecha y hora </th>
            <th scope="col">Sucursal</th>
            <th scope="col">Caja</th>
            <th scope="col">Creado por</th>
            <th scope="col">Ver</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $empresa = $_SESSION["empresa_db"];
                $lista_venta = $conexion->query("SELECT * FROM $empresa.tbl_venta_temp where en_espera = 1");

                while($row = $lista_venta->fetch_assoc())
                    { 
            ?>
                    <!-- Head Tabla usuario   --->
                        <tr>
                            <td><?php echo $row["fecha_creacion"]; ?></td>
                            <td>Sambil</td>
                            <td>Caja-01</td>
                            <td><?php echo $row["creado_por"]; ?></td>
                            <td><a id="cerrar" href="punto_de_venta.php?id_temp=<?php echo $row['id_venta'];?>"  class="btn btn-info" >Continuar</a> <a id="cerrar"  class="btn btn-danger" data-toggle="modal" data-target="#eliminar<?php echo $row["id_venta"];?>" ><i class="fa fa-times fa-lg"></i></a></td>
                        </tr>
             
            
        <!--Modal Eliminar usuario   --->
            <div class="modal fade" id="eliminar<?php echo $row["id_venta"];?>" tabindex="-1" aria-labelledby="eliminar<?php echo $row["id_venta"];?>Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eliminar<?php echo $row["id_venta"];?>Label">Eliminar</h5>
                            <button type="button" class="close cerrar" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Seguro que desea eliminar la venta en espera </strong>?
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cerrar" data-dismiss="modal"><i class="fa fa-times fa-lg"></i></button>
                            <a href="../../scripts/ventas/eliminar_venta_espera.php?id=<?php echo $row["id_venta"]?>" class="btn btn-danger" value="Guardar">Borrar</a>
                        </div>
                            </form>

                        </div>
                    </div>
                </div>
                <?php
                    }
?>
                </tbody>
    </table>
                
</div>

<?php
                    
?>
  


<!-- Modal -->
