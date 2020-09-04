<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //Registro de Datos de los Suplidores..
    //$cambiar_sup = $_POST['cambiar_sup'];
    $codigo_sup = $_POST['codigo_sup']; 
    $nombre_sup = $_POST['nombre_sup']; 
    $contacto_sup = $_POST['contacto_sup'];
    $sector_sup = $_POST['sector_sup']; 
    $ciudad_sup = $_POST['ciudad_sup']; 
    $tel_no1_sup = $_POST['tel_no1_sup'];
    $tel_no2_sup = $_POST['tel_no2_sup'];
    $tel_no3_sup = $_POST['tel_no3_sup'];
    $rnc_sup = $_POST['rnc_sup'];
    $nota_sup = $_POST['nota_sup']; 
   
    $conexion->query("UPDATE $empresa.tbl_suplidores  SET nombre_sup='$nombre_sup', contacto_sup='$contacto_sup', sector_sup= '$sector_sup', ciudad_sup= $ciudad_sup , unidad = $unidad, tel_no1_sup = '$tel_no1_sup', tel_no2_sup = '$tel_no2_sup',          tel_no3_sup = '$tel_no3_sup' rnc_sup='$rnc_sup', nota='$nota_sup'  where codigo_sup = $codigo_sup");
    
    header('location:../../views/suplidores/frm_suplidores.php')
?>