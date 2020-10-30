<?php include("../base.php");
$consulta_cliente = $conexion->query("SELECT id_cliente FROM $empresa.tbl_clientes ORDER BY id_cliente desc limit 1");
$registro_cliente = $consulta_cliente->fetch_assoc();
$id_nuevo_cliente = $registro_cliente["id_cliente"] + 1;
?>
<script>

    $(document).ready(function(){
        $(".cajas").hide();
        $("#back").hide();
        $("#new").click(function(){
            $("#formulario").show();
            $(".superior").hide();
        });
        $("#volver").click(function(){
            $("#formulario").hide();
            $(".superior").show();
        });
        $("#config").click(function(){
            $(".cajas").show();
            $("#back").show();
            $(".superior").hide();
        });
        $("#back").click(function(){
            $(".cajas").hide();
            $("#back").hide();
            $(".superior").show();
        }); 
    });
    </script>
</script>
<link rel="stylesheet" href="../../css/cierre_venta.css">
<div class="container-articulos">
    <div class="container ">
            <div class="form-row">
                <?php $consulta_cajas = $conexion->query("SELECT * FROM $empresa.tbl_cajas"); 
                while($cajas = $consulta_cajas->fetch_assoc())
                {
                ?>
                <div class="form-group col-md-12 cajas">
                        <div class="form-group col-md-6" style="float:left">
                        <a href="ver_ventas.php"><small><?php echo $cajas["caja_sucursal"];?></small>
                            <br><h4><?php echo $cajas["caja_nombre"]; ?></h4></a>
                        </div>
                        <div class="form-group col-md-6" style="float:right">
                            
                        <a href="../../scripts/ventas/vincular_caja.php?caja=<?php echo $cajas["id_caja"]; ?>"><small>Conectar con este dispositivo</small>
                            <i class="fa fa-plug fa-lg" aria-hidden="true"></i></a>
                        </div>
                        <br><h4><?php echo $cajas["ip"]; ?></h4>
                </div>
                <?php
                }
                ?>

                <div tyle="margin-right:15px; margin-left:18px;" class="form-group col-md-12">
                    <center>
                        <a id="back" class="btn btn-info">Volver</a>
                    </center>
                </div>
                
            
                <div class="form-group col-md-12 superior">
                    <center>  
                        <a href="ver_ventas.php">
                            <small>Listado de cierres </small>
                            <br><h3>365</h3>
                        </a>
                        <hr>
                        <a id="new" href="#">
                            <small>Nuevo cierre</small>
                            <br><h3><i class="fa fa-plus-circle fa-lg"></i></h3>
                        </a>
                        <hr>
                        <a id="config" href="#">
                            <small>Configuración</small>
                            <br><h3><i  class="fa fa-cog fa-lg"></i></h3>
                        </a>
                    </center>
                </div>  
               
            </div>
            <form id="form"  action="../../scripts/clientes/crear_clientes.php" method="post">
            <div class="form-row" id="formulario" style="display:none;">
                <div class="form-group col-md-6">
                    <labe>Apertura</label>
                    <input class="form-control" placeholder="Apertura">
                </div>
                <div class="form-group col-md-6">
                    <labe>Diferencia</label>
                    <input class="form-control" placeholder="Total">
                </div> 
                <div class="form-group col-md-12">
                Distribución de efectivo
                   
                </div>   
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$1">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$5">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$10">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$25">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$50">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$100">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$500">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$1000">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="$2000">
                </div> 
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Total">
                </div> 
                <div class="form-group col-md-6">
                    <input class="btn btn-info"style="width:100%;" type="submit" value="Registrar">
                </div>
                <div class="form-group col-md-6">
                    <a class="btn btn" id="volver" style="width:100%; background-color:#882f88;">Volver atras</a>
                </div> 
            </div>
            
            <br>
          
        </form>
    </div>    
    
</div>


</div>