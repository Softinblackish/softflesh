<?php include("../base.php");
$consulta_cliente = $conexion->query("SELECT id_cliente FROM $empresa.tbl_clientes ORDER BY id_cliente desc limit 1");
$registro_cliente = $consulta_cliente->fetch_assoc();
$id_nuevo_cliente = $registro_cliente["id_cliente"] + 1;
?>
<link rel="stylesheet" href="../../css/clientes.css">
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
                    <input type="text" class="form-control movil" placeholder ="(000)-000-0000" name="telefono" required >
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder ="Referencia" name="referencia" required>
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
                    <input type="number" class="form-control" placeholder ="Límite de crédito" name="credito" required>
                </div>
                
            </div>
            <label class="form-check-label" for="gridCheck">
                    Al hacer click en "Crear" se creará el usuario, parametrizar en ver clientes. 
            </label>
            <br>
            <input type="submit" id="btn" class="btn  btn" value="Crear"> <a href="../../scripts/clientes/crear_clientes.php" id="btn" class="btn btn">Cancelar</a>
            <br>
            <br>
        </form>
    </div>    
</div>