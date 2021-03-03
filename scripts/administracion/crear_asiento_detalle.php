<?php
    include('../conexion/cone.php');
    session_start();
    $empresa = $_SESSION['empresa_db'];
    $usuario = $_SESSION['user'];

    $cuenta = $_POST['cuenta'];
    $area =  $_POST['area'];
    $identificativo = $_POST['identificativo'];

    $contador=0;
    while($contador < 100)
    {
        if(isset($_POST['origen'.$contador])){
            $origen= $_POST['origen'.$contador];
            $debito = 0;
            $credito = 0;
            if($origen == "debito")
            {
                $debito=1;
            }
            else
            {
                $credito=1;
            }
        }
        $contador = $contador +1;
    }
    
    $id_temp=  $_POST['id_temp'];

    $insertar_asiento = $conexion->query("INSERT INTO $empresa.tbl_asientos (cuenta,area, identificativo, id_temp, credito, debito, creado_por) values ('$cuenta','$area','$identificativo',$id_temp, $credito, $debito, '$usuario')");
    ?>
    <div class="row" id="fila" style="margin-bottom:10px; margin-top:10px;">
                        <div class="col-md-4">
                            <select name="cuenta" class="form-control" id="">
                                <?php
                                        $listar_cuentas = $conexion->query("select * from $empresa.tbl_cuentas_contables");
                                         while($lista_de_cuentas = $listar_cuentas->fetch_assoc())
                                         {
                                             ?>
                                                <option value="<?php echo $lista_de_cuentas['id_cuenta']?>"><?php echo $lista_de_cuentas['nombre_cuenta']?></option>
                                             <?php
                                         }
                                         $asientos = $conexion->query("select * from $empresa.tbl_asientos where id_temp = $id_temp");
                                         $cantidad = $asientos->num_rows;
                                         $cantidad = $cantidad + 1;

                                ?>
                               </select>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <input type="radio" style="margin-left:5px;" class="form-check-input" checked value="debito" name="origen<?php echo $cantidad?>" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <input type="radio" style="margin-left:5px;" class="form-check-input" value="credito" name="origen<?php echo $cantidad?>" id="">
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