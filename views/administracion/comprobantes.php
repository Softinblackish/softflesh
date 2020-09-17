<?php include("../base.php");
$tipo=$_GET['tipo']; 
$consulta_comprobante = $conexion->query("SELECT * FROM $empresa.tbl_comprobantes WHERE tipo='$tipo' ORDER BY id_comprobante desc limit 1 ");
$registros_comprobante = $consulta_comprobante->fetch_assoc();
?>
<link rel="stylesheet" href="../../css/articulos.css">
<div class="container-articulos">
    <div class="container form-row">
    <?php 
            if(isset($_GET['error_menor']))
            {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" style="width:100%;" role="alert">
                        <strong>Error!</strong> El nuevo limite debe ser mayor al activo hasta.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php
            }
        ?>
        <form id="form"  action="../../scripts/administracion/actualizar_limite_comprobante.php" method="post">
            <div class="cabeza">
               <h2><?php echo $_GET['tipo']; ?></h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                   Próximo <input type="text" class="form-control" readonly disables value="<?php echo $registros_comprobante['proximo']; ?>">
                </div>
                <div class="form-group col-md-6">
                   Activos hasta
                   <input type="text" class="form-control" disabled readonly value="<?php echo $registros_comprobante['maximo']; ?>">
                </div> 
                <div class="form-group col-md-3">
                   Nuevo límite
                   <input type="Number" class="form-control" min="<?php echo $registros_comprobante['maximo']; ?>" name="limite" value="<?php echo $registros_comprobante['maximo']; ?>">
                </div> 
                <input type="hidden" name="tipo" value="<?php echo $_GET["tipo"] ?>">
                <div class="form-group col-md-4">
                    Cantidad para alerta
                   <input type="Number" class="form-control" min="1" name="alerta" value="<?php echo $registros_comprobante["cantidad_alerta"]; ?>">
                </div> 
            </div>
            <input type="submit" id="btn" class="btn btn" value="Nuevo limite"> <a style="margin-left:15px;" href="../administracion/administracion.php" id="btn" class="btn btn">Recuperar perdidos</a> <a style="margin-left:15px;" href="../administracion/administracion.php" id="btn" class="btn btn">Ver recuperados</a>
        </form>
    </div>    
</div>