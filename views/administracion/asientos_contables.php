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
            <h5>Venta</h5>
                <hr>
            <h5>Compra</h5>
                <hr>
            <h5>Cuentas x p</h5>
                <hr>
            <h5>Cuantas x c</h5>
                <hr>
            <h5>Inventario</h5>
                <hr>
            <h5>Nomina</h5>
                <hr>
        </div>
        <div class="col-md-9" style="border:solid 1px gray;">
            <div class="row"> 
                <div class="col-md-6 bg-info" style="color: white; padding-top:15px;padding-bottom:15px; padding-left:40px;">
                    <h5>Agregar asiento de ventas</h5> 
                </div>
                <div class="col-md-6 bg-info" style="color: white;padding-top:15px; padding-left:40px;padding-bottom:15px;">
                    <h5>Ver asientos de ventas</h5>
                </div>
            </div><br>
            <div id="agregar_asiento_de_venta" style="display: none;">
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
                            <input type="hidden" name="area" value="ventas" id="">
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
                            <div class="col-md-2">
                                <div>
                                    <a class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i></a>
                                </div>
                            </div><br>
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
            <div id="ver_asientos_de_venta" >
                <div>
                    <?php 
                        $lista_asientos = $conexion->query("SELECT * FROM $empresa.tbl_asientos where area = 'ventas'");
                        
                        while($asientos = $lista_asientos->fetch_assoc())
                        {
                            ?>
                                <div class="alert alert-primary" role="alert">
                                   <div class="row">
                                        <div class="col-md-6" style="color:Black"> <?php echo $asientos['identificativo']  ?></div>
                                        <div class="col-md-2"> <i class="fa fa-cogs fa-lg"></i> Config</div>
                                        <div class="col-md-2"> <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>Editar</div>
                                        <div class="col-md-2"> <i class="fa fa-eye fa-lg" aria-hidden="true"></i>Ver</div>
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
