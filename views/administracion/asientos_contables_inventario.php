<?php include("../base.php");
?>
<link rel="stylesheet" href="../../css/usuarios.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="../../scripts/js/usuarios.js"></script>

<div id="box_lista">
    <h2>Asientos contables</h2>
    <br>
    <div class="row">
    
        <div id="menu_asientos" class="col-md-3" style="background-color:rgb(87, 220, 200); padding:25px; color:white;">
            <h5> <a href="asientos_contables.php"> Venta </a> </h5>
                <hr>
            <h5 ><a href="asientos_contables_compra.php">Compra </a></h5>
                <hr>
            <h5>  <a href="asientos_contables_pagar.php"> Cuentas x p </a></h5>
                <hr>
            <h5>  <a href="asientos_contables_cobrar.php"> Cuantas x c</a></h5>
                <hr>
            <h5 style="margin-left: 45px;">  <a href="asientos_contables_inventario.php"> Inventario</a></h5>
                <hr>
            <h5>  <a href="asientos_contables_nomina.php"> Nomina</a></h5>
                <hr>
        </div>
        <div class="col-md-9" style="border:solid 1px gray;">
            <div class="row"> 
                <div class="col-md-6 bg-info" id="agregar" style="color: white; padding-top:15px;padding-bottom:15px; padding-left:40px;">
                    <h5>Agregar asiento de inventario</h5> 
                </div>
                <div class="col-md-6 bg-info" id="ver" style="color: white;padding-top:15px; padding-left:40px;padding-bottom:15px;">
                    <h5>Ver asientos de inventario</h5>
                </div>
            </div><br>
            <div id="agregar_asiento_de_venta" >
                <form action="" id="formularioaenviar" method="">
                    <div id="agregar_asiento" >
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Identificativo del asiento" name="identificativo" id="identificativo">
                            </div><br><br><br>   
                            <div class="col-md-4">Cuenta</div>
                            <div class="col-md-3">Debito</div>
                            <div class="col-md-3">Credito</div>
                        </div>
                        <div class="row" id="fila">
                            <div class="col-md-4">
                                <select name="cuenta" class="form-control" id="">
                                <?php
                                $id_aleatorio = rand(1,99999999999);
                                $buscar_id = $conexion->query("select * from $empresa.tbl_asientos where id_temp = $id_aleatorio");
                                $existencia = $buscar_id->num_rows;
                                if($existencia > 0)
                                    {
                                        $id_aleatorio = $id_aleatorio . 00;
                                    }
                                
                                $listar_cuentas = $conexion->query("select * from $empresa.tbl_cuentas_contables");
                                while($lista_de_cuentas = $listar_cuentas->fetch_assoc())
                                    {
                                    ?>
                                        <option value="<?php echo $lista_de_cuentas['id_cuenta']?>"><?php echo $lista_de_cuentas['nombre_cuenta']?></option>
                                    <?php
                                    }

                                ?>
                                </select>
                            </div>
                            <input type="hidden" name="area" value="inventario" id="">
                            <input type="hidden" name="id_temp" value="<?php echo $id_aleatorio;?>" id="">
                            <div class="col-md-3">
                                <div>
                                    <input type="radio" style="margin-left:5px;" class="form-check-input" checked value="debito" name="origen1" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <input type="radio" style="margin-left:5px;" class="form-check-input" value="credito" name="origen1" id="">
                                </div>
                            </div>
                            <br>
                        </div>
                        <div id="nueva_linea" >
            
                        </div>
                        <div class="row" style="margin-left:-15px; margin-bottom:25px;">
                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-info" type="submit" value="Agregar nueva fila">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
                        
            <div id="ver_asientos_de_venta" style="display: none;">
                <div>
                    <?php 
                       
                        $lista_asientos = $conexion->query("SELECT DISTINCT id_temp id_asiento, identificativo, predeterminado FROM $empresa.tbl_asientos where area = 'inventario'");
                        while($asientos = $lista_asientos->fetch_assoc())
                        {
                            
                            ?>
                                <div class="alert alert-primary" role="alert">
                                   <div class="row">
                                        <div class="col-md-4" style="color:Black"> <?php echo $asientos['identificativo']  ?></div>
                                        <div class="col-md-3"> <button class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $asientos['id_asiento'] ?>" ><i class="fa fa-cogs fa-lg" ></i> Config</button> </div>
                                        <div class="col-md-3"> <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $asientos['id_asiento'].'edit' ?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"   ></i>Borrar</button></div>
                                   </div>
                                </div>
                        
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $asientos['id_asiento']  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" >
                                        <div class="modal-content" >
                                            <div class="modal-header" >
                                                <h5 class="modal-title" id="exampleModalLabel<?php echo $asientos['id_asiento']?>">Configuracion de asiento en venta</h5>
                                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formulario_campo" method="post" action="../../scripts/administracion/agregar_campo_asiento.php">
                                                    <H6 >
                                                        Vinculacion a formulario
                                                    </H6>
                                                    <div class="col-md-3">
                                                        Predeterminado<input type="radio"  <?php if($asientos['predeterminado']==1){ ?> checked <?php }  ?>  name="predeterminado" id="">
                                                    </div>
                                                    <input type="hidden" value="inventario" name="area">
                                                    <div class="row bg-info" style="padding:15px; color:white;">
                                                        <div class="col-md-5">Cuenta</div>
                                                        <div class="col-md-2">Origen</div>
                                                        <div class="col-md-5">Vincular</div>
                                                    </div>
                                                    <div>
                                                    <?php 
                                                        $contador= 0;
                                                        $id_temp = $asientos['id_asiento'];
                                                        $lista_asiento = $conexion->query("SELECT * FROM $empresa.tbl_asientos where id_temp = $id_temp");
                                                        while($asiento = $lista_asiento->fetch_assoc())
                                                        {
                                                            $id_cuenta = $asiento['cuenta'];
                                            
                                                            $lista_cuentas = $conexion->query("SELECT * FROM $empresa.tbl_cuentas_contables where id_cuenta = $id_cuenta");
                                                            while($cuentas = $lista_cuentas->fetch_assoc())
                                                            {
                                                                
                                                                $contador= $contador + 1;
                                                                ?>
                                                                    <div class="row">
                                                                            <div class="col-md-5"> <br> <?php echo $cuentas['nombre_cuenta'] ?> </div>
                                                                            <div class="col-md-2"> 
                                                                                <br>
                                                                                <?php if($asiento['debito'] ==1)
                                                                                    {
                                                                                        echo 'Debito';
                                                                                    }
                                                                                    else{
                                                                                        echo 'Credito';
                                                                                    }
                                                                                ?> 
                                                                            </div>  
                                                                            <div class="col-md-5"> 
                                                                                <br>
                                                                                <input type="hidden" value="<?php echo $asiento['id_asiento'];?>" name="fila_asiento<?php echo $contador?>">
                                                                                <select class="form-control campo"  name="campos_ventas<?php echo $contador?>" id="campos_ventas">
                                                                                    <option value="Pago total"><?php echo $asiento['campo_vinculado'];?></option>
                                                                                    <option value="Pago total">Pago total</option>
                                                                                    <option value="Pago Itbis">Pago Itbis</option>
                                                                                    <option value="Pago valor sin Itbis">Pago valor sin Itbis</option>
                                                                                    <option value="Pago adelantado">Pago adelantado</option>
                                                                                    <option value="Cantidad a credito">Cantidad a credito</option>
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                <?php 
                                                            }
                                                        }
                                                    ?>
                                                    </div>              
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-info" value="Guardar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>    







  <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $asientos['id_asiento'].'edit'  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" >
                                        <div class="modal-content" >
                                            <div class="modal-header" >
                                                <h5 class="modal-title" id="exampleModalLabel<?php echo $asientos['id_asiento'].'edit'?>">Edicion de asiento en venta</h5>
                                                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    Desea eliminar el asiento: <strong><?php echo $asientos['identificativo']?></strong>
                                                </div>              
                                            </div>
                                            <?php $name= $asientos['id_asiento'] ?>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="../../scripts/administracion/eliminar_asiento.php?name=<?php echo $name?>" class="btn btn-danger" >Borrar</a>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>                      
        </div>
    </div>
</div>

<script type="text/javascript">


$("#agregar").click(function(){
    $("#agregar_asiento_de_venta").show();
    $("#ver_asientos_de_venta").hide();
});
$("#ver").click(function(){
    $("#agregar_asiento_de_venta").hide();
    $("#ver_asientos_de_venta").show();
});

    $('#formularioaenviar').submit(function (ev) {
        if($('#identificativo').val()!= '')
        {
            $.ajax({
                type: 'post', 
                url:'../../scripts/administracion/crear_asiento_detalle.php',
                data: $('#formularioaenviar').serialize(),
                success: function (data) { 
                    $("#nueva_linea").append(data);
                } 
            });
            ev.preventDefault();
        }
        else{
            alert('El asiento debe tener un identificativo');
        }
    });



</script>
<!-- Modal -->
