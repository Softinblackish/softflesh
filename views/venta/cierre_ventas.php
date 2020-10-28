<?php include("../base.php");
$consulta_cliente = $conexion->query("SELECT id_cliente FROM $empresa.tbl_clientes ORDER BY id_cliente desc limit 1");
$registro_cliente = $consulta_cliente->fetch_assoc();
$id_nuevo_cliente = $registro_cliente["id_cliente"] + 1;
?>
<Script>

    $(document).ready(function(){
        $("#new").click(function(){
            $("#formulario").show();
            $(".superior").hide();
        });
        $("#volver").click(function(){
            $("#formulario").hide();
            $(".superior").show();
        });
        

    });
</script>
<link rel="stylesheet" href="../../css/cierre_venta.css">
<div class="container-articulos">
    <div class="container ">
            <div class="form-row">
        
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
                        <a id="new" href="#">
                            <small>Configuración</small>
                            <br><h3><i  class="fa fa-cog fa-lg"></i></h3>
                        </a>
                        <hr>
                        <a id="new" href="#">
                            <small>Cajas</small>
                       
                            <br><h3><i class="fa fa-shopping-basket"></i></h3>
                        
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
            <br>
            <br>
        </form>
    </div>    
    
</div>


</div>