<?php include("../base.php"); ?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/clientes/crear_clientes.php" method="post">
            <div class="cabeza">
               <h2> Nuevo cliente</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Código" name="codigo" required disabled>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Nombre" name="nombre" required>
                </div>

                <div class="form-group col-md-6">
                <select class="form-control" placeholder ="País" name="pais" required>
                        <option>República Dominicana</option>
                        <option>Haití</option>
                        <option>Puerto Rico</option>
                        <option>Cuba</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                <select class="form-control" placeholder ="Provincia" name="provincia" required>
                        <option>Santo Domingo</option>
                        <option>Santiago</option>
                        <option>La romana</option>
                        <option>San Francisco</option>

                    </select>
                </div>
                <div class="form-group col-md-12">
                    <textarea type="text" class="form-control" placeholder ="Dirección" name="direccion" required ></textarea>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Telefono" name="telefono" required >
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" placeholder ="Tipo de comprobante" name="tipo_comprobante" required>
                        <option>Consumidor final</option>
                        <option>Valor físcal</option>
                        <option>Gubernamental</option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" placeholder ="Tipo de cliente" name="tipo_cliente" required>
                        <option>Recurrente</option>
                        <option>Ocasional</option>
                        <option>Intermitente</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="RNC" name="rnc" required >
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" placeholder ="Condición" name="condicion" required>
                        <?php $condiciones_pago = $conexion->query("SELECT nombre_condicion_p FROM $empresa.tbl_condiciones_pago"); 
                        while($row = $condiciones_pago->fetch_assoc()) {
                        ?>
                        <option><?php echo $row["nombre_condicion_p"];  ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" placeholder ="Límite de crédito" name="credito" required>
                </div>
                
            </div>
            <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará el usuario, parametrizar en ver usuarios. 
            </label>
            <br>
            <input type="submit" id="btn" class="btn  btn" value="Crear"> <a href="../../scripts/clientes/crear_clientes.php" id="btn" class="btn btn">Cancelar</a>
            <br>
            <br>
        </form>
    </div>    
</div>