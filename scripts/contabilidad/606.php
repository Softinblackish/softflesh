<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

    //cabeza inicial de la compra.
    $tipo_id= $_POST['tipo_id'];
    $T_Bienes_servicios= $_POST['T_Bienes_servicios']; 
    $NCF= $_POST['NCF'];
    $NCF_docMod= empty($_POST['NCF_docMod']) ? 'null' : $_POST['NCF_docMod'];
    $Fec_comprobante= $_POST['Fec_comprobante']; 
    $Fec_pago = $_POST['Fec_pago'];
    $Monto_Facturado_Servicios= $_POST['Monto_Facturado_Servicios'];
    $Monto_Facturado_Bienes= $_POST['Monto_Facturado_Bienes'];
    $Total_Monto_facturado= $_POST['Total_Monto_facturado'];
    $Itebis_Facturado= $_POST['Itebis_Facturado'];
    $Itebis_Retenido= $_POST['Itebis_Retenido'];
    $Itebis_sub_a_proporcionalidad= empty($_POST['Itebis_sub_a_proporcionalidad']) ? null : $_POST['Itebis_sub_a_proporcionalidad'];
    $Itebis_llevado_al_costo = empty($_POST['Itebis_llevado_al_costo'])? null : $_POST['Itebis_llevado_al_costo']; 
    $Itebis_por_adelantar= $_POST['Itebis_por_adelantar'];
    $Itebis_percibido_compra= empty($_POST['Itebis_percibido_compra']) ? null : $_POST['Itebis_percibido_compra'];
    $Tipo_Retencion_ISR= $_POST['Tipo_Retencion_ISR'];
    $Monto_Retencion_Renta= $_POST['Monto_Retencion_Renta'];
    $ISR_percibido_compra= $_POST['ISR_percibido_compra'];
    $Impuesto_selectivo_consumo= $_POST['Impuesto_selectivo_consumo'];
    $Monto_prima_legal= $_POST['Monto_prima_legal'];
    $Forma_pago= $_POST['Forma_pago'];
    $Estatus= $_POST['Estatus'];
    
        $consulta_det_606 = $conexion->query("SELECT tipo_id FROM $empresa.tbl_contabilidad where tipo_id = $tipo_id ");
        //$registro_det_compras = $consulta_det_606->fetch_assoc();
        if($consulta_det_606->num_rows >= 1 ){
            
        }else{
            
            $Reg_det_contablidad = $conexion->query("insert into $empresa.tbl_contabilidad (tipo_id,T_Bienes_servicios,NCF,NCF_docMod,Fec_comprobante,Fec_pago,Monto_Facturado_Servicios,Monto_Facturado_Bienes,Total_Monto_facturado,Itebis_Facturado,Itebis_Retenido,Itebis_sub_a_proporcionalidad,Itebis_llevado_al_costo,Itebis_por_adelantar,Itebis_percibido_compra,Tipo_Retencion_ISR,Monto_Retencion_Renta,ISR_percibido_compra,Impuesto_selectivo_consumo,Monto_prima_legal,Forma_pago,Estatus) values ($tipo_id,'$T_Bienes_servicios','$NCF','$NCF_docMod','$Fec_comprobante','$Fec_pago',$Monto_Facturado_Servicios,$Monto_Facturado_Bienes,$Total_Monto_facturado,$Itebis_Facturado,$Itebis_Retenido,$Itebis_sub_a_proporcionalidad,$Itebis_llevado_al_costo,$Itebis_por_adelantar,$Itebis_percibido_compra,$Tipo_Retencion_ISR,$Monto_Retencion_Renta,$ISR_percibido_compra,$Impuesto_selectivo_consumo,$Monto_prima_legal,'$Forma_pago','$Estatus') ");
            
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

    header('location:../../views/contabilidad/frm_llenado_606.php?registro="si" ')
?>