<?php include("../base.php");
$consulta_cliente = $conexion->query("SELECT id_cliente FROM $empresa.tbl_clientes ORDER BY id_cliente desc limit 1");
$registro_cliente = $consulta_cliente->fetch_assoc();
$id_nuevo_cliente = $registro_cliente["id_cliente"] + 1;
?>
<script>

    $(document).ready(function(){
        $(".holders_no").hide();
        $(".cajas").hide();
        $("#back").hide();
        $("#sin_A").hide();
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
        $(".holders1").click(function(){
            $(".holders1").hide();
            $("#uno").val("");
            $("#uno").show();
            $("#uno").focus();
        });
        $(".holders5").click(function(){
            $(".holders5").hide();
            $("#cinco").val(" ");
            $("#cinco").show();
            $("#cinco").focus();
        });
        $(".holders10").click(function(){
            $(".holders10").hide();
            $("#diez").val(" ");
            $("#diez").show();
            $("#diez").focus();
        });
        $(".holders25").click(function(){
            $(".holders25").hide();
            $("#veinticinco").val(" ");
            $("#veinticinco").show();
            $("#veinticinco").focus();
        });
        $(".holders50").click(function(){
            $(".holders50").hide();
            $("#cincuenta").val(" ");
            $("#cincuenta").show();
            $("#cincuenta").focus();
        });
        $(".holders100").click(function(){
            $(".holders100").hide();
            $("#cien").val(" ");
            $("#cien").show();
            $("#cien").focus();
        });
        $(".holders200").click(function(){
            $(".holders200").hide();
            $("#dosciento").val(" ");
            $("#dosciento").show();
            $("#cien").focus();
        });
        $(".holders500").click(function(){
            $(".holders500").hide();
            $("#quiniento").val(" ");
            $("#quiniento").show();
            $("#quiniento").focus();
        });
        $(".holders1000").click(function(){
            $(".holders1000").hide();
            $("#mil").val(" ");
            $("#mil").show();
            $("#mil").focus();
        });
        $(".holders2000").click(function(){
            $(".holders2000").hide();
            $("#dosmil").val(" ");
            $("#dosmil").show();
            $("#dosmil").focus();
        });
        $("#back").click(function(){
            $(".cajas").hide();
            $("#back").hide();
            $(".superior").show();
        }); 
        
        $(".monedas").keyup(function(){
             var uno = $("#uno").val();
             var cinco = $("#cinco").val();
             var diez = $("#diez").val();
             var veinticinco = $("#veinticinco").val();
             var cincuenta = $("#cincuenta").val();
             var cien = $("#cien").val();
             var dosciento = $("#dosciento").val();
             var quiniento = $("#quiniento").val();
             var mil = $("#mil").val();
             var dosmil = $("#dosmil").val();
             var resultados = parseInt(uno) + parseInt(cinco)*5 + parseInt(diez)*10 + parseInt(veinticinco)*25 + parseInt(cincuenta)*50 + parseInt(cien)*100 + parseInt(dosciento)*200 + parseInt(quiniento)*500 + parseInt(mil)*1000 + parseInt(dosmil)*2000;
             
             $("#total").val(resultados);

             var caja_result = $("#cajon").val();
             var resultado = parseInt(caja_result) - resultados;
             var total = resultado;
             $("#diferencia").val(total);
         
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
                <div class="form-group col-md-4 cajas">
                        <div class="form-group col-md-6" style="float:left">
                        <a><small><?php echo $cajas["caja_sucursal"];?></small>
                            <br><h4><?php echo $cajas["caja_nombre"]; ?></h4>
                            <small>
                           
                                <?php 
                                    $apertura = $cajas["apertura"];
                                    if($apertura > 0)
                                    {
                                        ?>
                                          <div class="con_A">  Apertura:
                                            <?php
                                                echo "$".$cajas["apertura"];
                                            ?> 
                                            <br>
                                            <A href="../../scripts/ventas/insertar_apertura.php?actualizar=<?php echo $cajas["id_caja"];?>">Modificar</a>
                                          </div>
                                            <?php
                                    }
                                    else{
                                        ?> 
                            
                                        Apertura:
                                            <form action="../../scripts/ventas/insertar_apertura.php" method="post">
                                                <input type="number" class="form-control" min="1" name="apertura" placeholder="Insertar">
                                                <input type="hidden" name="caja" value="<?php echo $cajas["id_caja"]; ?>">
                                            </form>
                                        
                                        <?php
                                    } ?>
                            </small>
                        </a>
                        </div>
                        <div class="form-group col-md-6" style="float:right">
                            
                        <a href="../../scripts/ventas/vincular_caja.php?caja=<?php echo $cajas["id_caja"]; ?>"><small>Conectar con este dispositivo</small>
                            <i class="fa fa-plug fa-lg" aria-hidden="true"></i></a><br>
                            <p><?php echo $cajas["ip"];?></p>
                        </div>
                        
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
                        <a href="ver_cierre.php">
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
            <form id="form"  action="../../scripts/ventas/cierre_ventas.php" method="post">
            <div class="form-row" id="formulario" style="display:none;">
                <div class="form-group col-md-6">
                    <labe>Apertura</label>
                    <?php
                        
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $consulta_caja = $conexion->query("SELECT * FROM $empresa.tbl_cajas where ip = '$ip'");
                        $resultados_Caja = $consulta_caja->fetch_assoc();
                     ?> 
                    <input class="form-control" name="apertura" value="<?php echo $resultados_Caja["apertura"]; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                    <labe>Vendido</label>
                        <?php  
                            $fecha = date("y-m-d");
                            $caja= $_SESSION["caja"];
                            $consulta_venta = $conexion->query("SELECT SUM(total) AS total FROM $empresa.tbl_ventas where fecha_creacion like '%$fecha%' and caja = '$caja'");  
                            $resultados_venta = $consulta_venta->fetch_assoc();
                        ?>
                    <input class="form-control" name="venta" value="<?php  echo $resultados_venta['total']?>">
                </div> 
                <div class="form-group col-md-6">
                    <labe>En caja</label>
                    <input class="form-control" id="cajon" name="caja" value="<?php  echo $en_caja = $resultados_Caja["apertura"] + $resultados_venta["total"]; ?>">
                </div> 
                <div class="form-group col-md-6">
                    <labe>Diferencia</label>
                    <input class="form-control" id="diferencia" name="diferencia" placeholder="Total">
                </div> 
                <div class="form-group col-md-12">
                <small>Colocar la cantidad de monedas o billetes en sus casilla correspondientes</small>
                   
                </div>   
                <div class="form-group col-md-6" >
            
                <input class="form-control monedas holders1" placeholder="$1">
                 <input class="form-control monedas holders_no" type="number" min="0"  id="uno" value="0" required >
                </div> 
                <div class="form-group col-md-6">
               
                    <input class="form-control monedas holders5 " type="number" placeholder="$5" >    
                    <input class="form-control monedas holders_no" type="number" min="0"  id="cinco" value="0" required>
                </div> 
                <div class="form-group col-md-6">
                
                    <input class="form-control monedas holders10" type="number" placeholder="$10">
                    <input class="form-control monedas holders_no" type="number" min="0" id="diez" value="0" required>
                </div> 
                <div class="form-group col-md-6">
              
                    <input class="form-control monedas holders25" type="number" placeholder="$25">
                    <input class="form-control monedas holders_no" type="number" min="0" id="veinticinco" value="0" required>
                </div> 
                <div class="form-group col-md-6">
              
                    <input class="form-control monedas holders50" type="number" placeholder="$50"> 
                    <input class="form-control monedas holders_no" type="number" min="0" id="cincuenta" value="0" required>
                </div> 
                <div class="form-group col-md-6">
               
                    <input class="form-control monedas holders100" type="number" placeholder="$100">
                    <input class="form-control monedas holders_no" type="number" min="0" id="cien" value="0" required>
                </div> 
                <div class="form-group col-md-6">
              
                    <input class="form-control monedas holders200" type="number" placeholder="$200">
                    <input class="form-control monedas holders_no" type="number" min="0" id="dosciento" value="0" required>
                </div> 
                <div class="form-group col-md-6">
              
                    <input class="form-control monedas holders500" type="number" placeholder="$500">
                    <input class="form-control monedas holders_no" type="number" min="0" id="quiniento" value="0" required>
                </div> 
                <div class="form-group col-md-6">
              
                <input class="form-control monedas holders1000" type="number" placeholder="$1000">
                    <input class="form-control monedas holders_no" type="number" min="0" id="mil" value="0" required>
                </div> 
                <div class="form-group col-md-6">
         
                <input class="form-control monedas holders2000" type="number" placeholder="$2000">
                    <input class="form-control monedas holders_no" type="number" min="0" id="dosmil" value="0" required>
                </div> 
                <div class="form-group col-md-6">
                <label>Total:</label>
                    <input class="form-control" name="total" id="total" placeholder="Total" readonly>
                </div> 
                <br>
                <div class="form-group col-md-12">
                    <input class="btn btn-info"style="width:100%;" type="submit" value="Registrar">
                </div>
                <div class="form-group col-md-12">
                    <a class="btn btn" id="volver" style="width:100%; background-color:#882f88;">Volver atras</a>
                </div> 
            </div>
            
            <br>
          
        </form>
    </div>    
    
</div>


</div>