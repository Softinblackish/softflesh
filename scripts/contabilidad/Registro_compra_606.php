<?php
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];

/*Aqui iran las variables que seran llenadas de la consulta */

$tipo_id = 0;
$T_Bienes_servicios = "";
$NCF = "";
$NCF_docMod = "";
$Fec_comprobante = "";
$Fec_pago = "";
$Monto_Facturado_Servicios = "";
$Monto_Facturado_Bienes = "";
$Total_Monto_facturado = "";
$Itebis_Facturado = 0;
$Itebis_Retenido = 0;
$Itebis_sub_a_proporcionalidad = 0;
$Itebis_llevado_al_costo = 0;
$Itebis_por_adelantar = 0;
$Itebis_percibido_compra = 0;
$Tipo_Retencion_ISR = 0;
$Monto_Retencion_Renta = 0;
$ISR_percibido_compra = 0;
$Impuesto_selectivo_consumo = 0;
$Monto_prima_legal = 0;
$Forma_pago = 0;
$Estatus = "";


$consulta_606 = $conexion->query("select art.articulo as T_Bienes_servicios, art.precio_compra as precio, art.cantidad, art.total as Total_Monto_facturado, det.comprobante, det.forma_pago, det.valor_impuestos, det.sin_impuestos, cod_I.porciento as ibis_retenido ,sup.rnc_sup as NCF FROM $empresa.tbl_compras det INNER JOIN $empresa.tbl_art_compras art on det.no_compra = art.no_compra INNER JOIN $empresa.tbl_suplidores sup on sup.codigo_sup = det.cod_proveedor INNER JOIN $empresa.tbl_cod_impuestos cod_I on cod_I.id_cod_impuesto = det.cod_impuesto");

$contador = 1;
$sumaMonto = 0;
while($row = $consulta_606->fetch_assoc())
{ 
    $sumaMonto = $sumaMonto + $row["Total_Monto_facturado"];
    $tipo_id = $contador;
    $T_Bienes_servicios = $row["T_Bienes_servicios"];
    $NCF = $row["NCF"];
    $NCF_docMod = "No Aplica";
    $Fec_comprobante = "00/00";
    $Fec_pago = "No Aplica";
    $Monto_Facturado_Servicios = 0;
    $Monto_Facturado_Bienes = $row["Total_Monto_facturado"];
    $Total_Monto_facturado = $sumaMonto;
    $Itebis_Facturado = 0;
    $Itebis_Retenido = 0;
    $Itebis_sub_a_proporcionalidad = 0;
    $Itebis_llevado_al_costo = 0;
    $Itebis_por_adelantar = 0;
    $Itebis_percibido_compra = 0;
    $Tipo_Retencion_ISR = 0;
    $Monto_Retencion_Renta = 0;
    $ISR_percibido_compra = 0;
    $Impuesto_selectivo_consumo = 0;
    $Monto_prima_legal = 0;
    $Forma_pago = $row["forma_pago"];
    $Estatus = "Exelente";
    
    /*
    echo $empresa . "   " . $tipo_id." ".$T_Bienes_servicios." ".$NCF." ".$NCF_docMod." ".$Fec_comprobante." ".$Fec_pago." ".$Monto_Facturado_Servicios." ".$Monto_Facturado_Bienes." ".$Total_Monto_facturado." ".$Itebis_Facturado." ".$Itebis_Retenido." ".$Itebis_sub_a_proporcionalidad." ".$Itebis_llevado_al_costo." ".$Itebis_por_adelantar." ".$Itebis_percibido_compra." ".$Tipo_Retencion_ISR." ".$Monto_Retencion_Renta." ".$ISR_percibido_compra." ".$Impuesto_selectivo_consumo." ".$Monto_prima_legal." ".$Forma_pago." ".$Estatus." "."\n"."</br>"."\n";
    */

    $Reg_det_contablidad = $conexion->query("insert into $empresa.tbl_contabilidad (tipo_id,T_Bienes_servicios,NCF,NCF_docMod,Fec_comprobante,Fec_pago,Monto_Facturado_Servicios,Monto_Facturado_Bienes,Total_Monto_facturado,Itebis_Facturado,Itebis_Retenido,Itebis_sub_a_proporcionalidad,Itebis_llevado_al_costo,Itebis_por_adelantar,Itebis_percibido_compra,Tipo_Retencion_ISR,Monto_Retencion_Renta,ISR_percibido_compra,Impuesto_selectivo_consumo,Monto_prima_legal,Forma_pago,Estatus) values ($tipo_id,'$T_Bienes_servicios','$NCF','$NCF_docMod','$Fec_comprobante','$Fec_pago',$Monto_Facturado_Servicios,$Monto_Facturado_Bienes,$Total_Monto_facturado,$Itebis_Facturado,$Itebis_Retenido,$Itebis_sub_a_proporcionalidad,$Itebis_llevado_al_costo,$Itebis_por_adelantar,$Itebis_percibido_compra,$Tipo_Retencion_ISR,$Monto_Retencion_Renta,$ISR_percibido_compra,$Impuesto_selectivo_consumo,$Monto_prima_legal,'$Forma_pago','$Estatus') ");
    
    
    $contador+=1;
}
/*Proceso para no repetir los datos*/ 
/*
$consulta = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606");
    if($consulta->num_rows >= 1 ){
        
    }
*/
//echo $empresa . "   " . $tipo_id." ".$T_Bienes_servicios." ".$NCF." ".$NCF_docMod." ".$Fec_comprobante." ".$Fec_pago." ".$Monto_Facturado_Servicios." ".$Monto_Facturado_Bienes." ".$Total_Monto_facturado." ".$Itebis_Facturado." ".$Itebis_Retenido." ".$Itebis_sub_a_proporcionalidad." ".$Itebis_llevado_al_costo." ".$Itebis_por_adelantar." ".$Itebis_percibido_compra." ".$Tipo_Retencion_ISR." ".$Monto_Retencion_Renta." ".$ISR_percibido_compra." ".$Impuesto_selectivo_consumo." ".$Monto_prima_legal." ".$Forma_pago." ".$Estatus." ";

//header('location:../../views/contabilidad/reporte_606.php?registro="si" ')
?>