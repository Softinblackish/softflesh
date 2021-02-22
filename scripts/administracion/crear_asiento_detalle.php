<?php
    include('../conexion/cone.php');
    session_start();
    $empresa = $_SESSION['empresa_db'];
    $usuario = $_SESSION['user'];

    $cuenta = $_POST['cuenta'];
    $debito = $_POST['debito'];
    $credito = $_POST['credito'];

    $origen = $_POST['origen'];
    
    if($origen == "debito"){
        $credito=0;
    }
    else{
        $debito=0;
    }
    $id_temp= 3;

    $insertar_asiento = $conexion->query("INSERT INTO $empresa.tbl_asientos (cuenta, debito_porciento, credito_porciento, id_temp, creado_por) values ('$cuenta', $debito, $credito,$id_temp, '$usuario')");
    ?>
    <div class="row" id="fila" style="margin-bottom:10px; margin-top:10px;">
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
                        </div>
                     <?php
                    
?>