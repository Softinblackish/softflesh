<?php
    //include("../conexion/cone.php");
    //session_start();
    $empresa= $_SESSION["empresa_db"];

    $consulta_compras = $conexion->query("SELECT id_compra FROM $empresa.tbl_compras ORDER BY id_compra desc limit 1");
    $registro_compras = $consulta_compras->fetch_assoc();
    if($consulta_compras->num_rows >= 1 ){
        $id_nueva_compra = $registro_compras["id_compra"] + 1;
        $no_compra = " " . $id_nueva_compra . rand(1,5000);
    }else{
        $id_nueva_compra =  1;
        $no_compra = " " . $id_nueva_compra . rand(1,5000);
    }

    $consulta_compras_id_temp = $conexion->query("SELECT no_compra FROM $empresa.tbl_compra_id_temp where id_compra = 1");
    if($consulta_compras_id_temp->num_rows >= 1 ){
        
    }else{
        $Reg_compras_id_temp = $conexion->query("insert into $empresa.tbl_compra_id_temp (no_compra) values ($no_compra) ");
    }

?>