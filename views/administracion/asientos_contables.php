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
            </div>
            <div style="float:left;">
                    <form action=""><br>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Identificativo del asiento" name="f" id="">
                            </div>
                        </div>
                    </form>
                </div> <br><br>

            <br>
            <div id="agregar_asiento" >
            <div class="row">
                <div class="col-md-3">Cuenta</div>
                <div class="col-md-3">Debito %</div>
                <div class="col-md-3">Credito %</div>
            </div>
            <div id="nueva_linea" >
            
            </div>
                <form action="../../scripts/administracion/crear_asiento_detalle.php" id="formularioaenviar" method="post">
                    <div class="row" id="fila">
                        <div class="col-md-3">
                            <select name="cuenta" class="form-control" id="">
                                <option value="">Ejemplo</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <input type="number" style="float: left;" class="form-control col-md-8" min="0" max="100" name="debito" value="100" id="">
                                <input type="radio" style="margin-left:5px;" class="form-check-input" checked value="debito" name="origen" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <input type="number" style="float: left;" class="form-control col-md-8" min="0" max="100" name="credito" value="100" id="">
                                <input type="radio" style="margin-left:5px;" class="form-check-input" value="credito" name="origen" id="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div>
                                <a class="btn btn-danger "><i class="fa fa-trash-o fa-lg"></i></a>
                            </div>
                        </div>
                        <br>
                        <div class="row" style="margin-left:2px;">
                            <div class="col-md-12">
                                <br>
                                <input class="btn btn-info" type="submit" value="Agregar nueva fila">
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">

$('#formularioaenviar').submit(function (ev) {
  $.ajax({
    type: $('#formularioaenviar').attr('method'), 
    url: $('#formularioaenviar').attr('action'),
    data: $('#formularioaenviar').serialize(),
    success: function (data) { 
        $("#nueva_linea").append(data);
     } 
  });
  ev.preventDefault();
});
</script>
<!-- Modal -->
