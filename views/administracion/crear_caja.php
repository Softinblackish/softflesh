<?php include("../base.php");

$consulta_sucursal = $conexion->query("SELECT * FROM $empresa.tbl_sucursal ");

?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/administracion/crear_caja.php" method="post">
            <div class="cabeza">
               <h2> Crear caja</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Nombre caja" name="nombre" required>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" name="sucursal">
                    <?php
                    while($row = $consulta_sucursal->fetch_assoc())
                    {
                    ?>
                        <option><?php echo $row["sucursal_nombre"];?></option>
                    <?php
                    }
                    ?>
                    </select>
                    
                </div>
                <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará la caja, puede modificar en ver cajas. <br>
                </label>
            <input type="submit" id="btn" class="btn btn" value="Crear"> <a style="margin-left:15px;" href="../administracion/administracion.php" id="btn" class="btn btn">Cancelar</a>
        </form>
    </div>    
</div>