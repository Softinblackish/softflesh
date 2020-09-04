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
    
   //echo $empresa . " " .$codigo_sup. " " .$nombre_sup. " " .$contacto_sup. " " .$sector_sup. " " .$ciudad_sup. " " .$tel_no1_sup.  " ".$tel_no2_sup." ".$tel_no3_sup." ".$tel_no3_sup." ".$rnc_sup." ".$nota_sup;

    $Reg_suplidores = $conexion->query("insert into $empresa.tbl_suplidores(codigo_sup, nombre_sup, contacto_sup, sector_sup, ciudad_sup, tel_no1_sup, tel_no2_sup, tel_no3_sup, rnc_sup, nota_sup)
            values ('$codigo_sup', '$nombre_sup', '$contacto_sup', '$sector_sup', '$ciudad_sup', '$tel_no1_sup', '$tel_no2_sup', '$tel_no3_sup', '$rnc_sup', '$nota_sup' ) ");
    
//cxcobrar y cxpagar
    header('location:../../views/suplidores/frm_suplidores.php?registro="si"')
?>