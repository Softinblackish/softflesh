<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];

    $servicios= $_POST['servicios']; 
    $inicial=$_POST["inicial"]; 
    $saldo=$_POST['saldo']; 
    $cant_pagos= $_POST['cant_pagos']; 
    $tipo_pago= $_POST['tipo_pago']; 
    $pago_mensual= $_POST['pago_mensual']; 
    $pago_anual= $_POST['pago_anual']; 
    $interes= $_POST['interes'];
    $moras= $_POST['moras'];
    $estatus= $_POST['estatus'];
    $descripcion= $_POST['descripcion'];
    
    //echo $servicios."   ".$inicial."   ".$saldo."   ".$cant_pagos."   ".$tipo_pago."   ".$pago_mensual."   ".$pago_anual."   ".$interes."   ".$moras."   ".$estatus."   ".$descripcion;
   
    $Reg_cxp = $conexion->query("INSERT into $empresa.tbl_cuentas_por_pagar (servicios, inicial, saldo, cant_pagos, tipo_pago, pago_mensual, pago_anual, interes, moras, estatus, descripcion)
            values ('$servicios', $inicial, $saldo, $cant_pagos, '$tipo_pago', $pago_mensual, $pago_anual, $interes, $moras, '$estatus', '$descripcion')");
    

    header('location: ../../views/Cuentas_por_pagar/frm_cuentas_por_pagar.php?registro="si"')
?>