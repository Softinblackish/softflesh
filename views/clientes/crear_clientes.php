<?php include("../base.php");
$consulta_cliente = $conexion->query("SELECT id_cliente FROM $empresa.tbl_clientes ORDER BY id_cliente desc limit 1");
$registro_cliente = $consulta_cliente->fetch_assoc();
$id_nuevo_cliente = $registro_cliente["id_cliente"] + 1;
?>
<link rel="stylesheet" href="../../css/clientes.css">
<script src="../../scripts/js/mascaras_punto_venta.js" type="text/javascript"></script>
<script src="../../scripts/js/form_clientes.js" type="text/javascript"></script>

<div class="container-articulos">
    <div class="container form-row">
        <form id="form"  action="../../scripts/clientes/crear_clientes.php" method="post">
            <div class="cabeza">
               <h2> Nuevo cliente</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder ="Código" value="<?php echo $id_nuevo_cliente; ?>" name="codigo" required readonly>
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
                    <input type="text" id="movil" class="form-control phone_us" placeholder ="(000)-000-0000" name="telefono" >
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder ="Referencia" name="referencia" required>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control"id="tipo" placeholder ="Tipo de cliente" name="tipo_identificacion" required>
                        <option value="1">RNC</option>
                        <option value="2">Cédula</option>
                        <option value="3">Pasaporte</option>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <input type="text" id="rnc" class="form-control" placeholder ="000000000" name="rnc" required>
                </div>
                <div class="form-group col-md-6">
                    <select class="form-control" placeholder ="Tipo de cliente" name="tipo_cliente" required>
                        <option>Recurrente</option>
                        <option>Ocasional</option>
                        <option>Intermitente</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input type="number" class="form-control" placeholder ="Límite de crédito" name="credito" required>
                </div>
                <div class="form-group col-md-12">
                    <input type="mail" class="form-control" placeholder ="Dirección de correo" name="correo" required>
                </div>
                
            </div>
            <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará el usuario, parametrizar en ver clientes. 
            </label>
            <br>
            <input type="submit" id="btn" class="btn btn" value="Crear"> <a id="btn" class="btn btn">Cancelar</a>
            <br>
            <br>
        </form>
    </div>    
</div>