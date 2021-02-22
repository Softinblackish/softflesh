<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];


    //$fecha= $_POST['fecha'];
    $año = date("Y");
    function general($var_fecha){
        $serie = "";
        for ($i=1; $i < 13 ; $i++) { 
            if($i<10){
                $serie .= $var_fecha."0".$i."\n";
            }else{
                $serie .= $var_fecha.$i."\n";
            }
        }
        return $serie;
    }
    $cadena = general($año);
    $trozos = explode("\n", $cadena);
    for ($i=0; $i < count($trozos); $i++) { 
        echo $trozos[$i]."<br>";
    }
    
    //echo general($año);
/*
        $consulta = $conexion->query("SELECT tipo_id FROM $empresa.tbl_contabilidad where tipo_id = $tipo_id ");
        
        if($consulta_det_606->num_rows >= 1 ){
            
        }else{
            
            $Reg_det_contablidad = $conexion->query("insert into $empresa.tbl_contabilidad (tipo_id,T_Bienes_servicios,NCF,NCF_docMod,Fec_comprobante,Fec_pago,Monto_Facturado_Servicios,Monto_Facturado_Bienes,Total_Monto_facturado,Itebis_Facturado,Itebis_Retenido,Itebis_sub_a_proporcionalidad,Itebis_llevado_al_costo,Itebis_por_adelantar,Itebis_percibido_compra,Tipo_Retencion_ISR,Monto_Retencion_Renta,ISR_percibido_compra,Impuesto_selectivo_consumo,Monto_prima_legal,Forma_pago,Estatus) values ($tipo_id,'$T_Bienes_servicios','$NCF','$NCF_docMod','$Fec_comprobante','$Fec_pago',$Monto_Facturado_Servicios,$Monto_Facturado_Bienes,$Total_Monto_facturado,$Itebis_Facturado,$Itebis_Retenido,$Itebis_sub_a_proporcionalidad,$Itebis_llevado_al_costo,$Itebis_por_adelantar,$Itebis_percibido_compra,$Tipo_Retencion_ISR,$Monto_Retencion_Renta,$ISR_percibido_compra,$Impuesto_selectivo_consumo,$Monto_prima_legal,$Forma_pago,'$Estatus') ");
            
        }

        echo $empresa . "   " . $tipo_id." ".$T_Bienes_servicios." ".$NCF." ".$NCF_docMod." ".$Fec_comprobante." ".$Fec_pago." ".$Monto_Facturado_Servicios." ".$Monto_Facturado_Bienes." ".$Total_Monto_facturado." ".$Itebis_Facturado." ".$Itebis_Retenido." ".$Itebis_sub_a_proporcionalidad." ".$Itebis_llevado_al_costo." ".$Itebis_por_adelantar." ".$Itebis_percibido_compra." ".$Tipo_Retencion_ISR." ".$Monto_Retencion_Renta." ".$ISR_percibido_compra." ".$Impuesto_selectivo_consumo." ".$Monto_prima_legal." ".$Forma_pago." ".$Estatus." ";

 /*
    tipo_id,
    T_Bienes_servicios,
    NCF,
    NCF_docMod,
    Fec_comprobante,
    Fec_pago,
    Monto_Facturado_Servicios,
    Monto_Facturado_Bienes,
    Total_Monto_facturado,
    Itebis_Facturado,
    Itebis_Retenido,
    Itebis_sub_a_proporcionalidad,
    Itebis_llevado_al_costo,
    Itebis_por_adelantar,
    Itebis_percibido_compra,
    Tipo_Retencion_ISR,
    Monto_Retencion_Renta,
    ISR_percibido_compra,
    Impuesto_selectivo_consumo,
    Monto_prima_legal,
    Forma_pago,
    Estatus
*/
/*
    $tipo_id,
    $T_Bienes_servicios,
    $NCF,
    $NCF_docMod,
    $Fec_comprobante,
    $Fec_pago,
    $Monto_Facturado_Servicios,
    $Monto_Facturado_Bienes,
    $Total_Monto_facturado,
    $Itebis_Facturado,
    $Itebis_Retenido,
    $Itebis_sub_a_proporcionalidad,
    $Itebis_llevado_al_costo,
    $Itebis_por_adelantar,
    $Itebis_percibido_compra,
    $Tipo_Retencion_ISR,
    $Monto_Retencion_Renta,
    $ISR_percibido_compra,
    $Impuesto_selectivo_consumo,
    $Monto_prima_legal,
    $Forma_pago,
    $Estatus
*/

    //header('location:../../views/contabilidad/frm_llenado_606.php?registro="si" ')
?>