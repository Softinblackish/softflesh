<?php
    //include("../conexion/cone.php");
    //session_start();
    $empresa= $_SESSION["empresa_db"];

    $consulta_nominas = $conexion->query("SELECT id_nomina FROM $empresa.tbl_nomina ORDER BY id_nomina desc limit 1");
    $registro_nominas = $consulta_nominas->fetch_assoc();
    if($consulta_nominas->num_rows >= 1 ){
        $id_nueva_nomina = $registro_nominas["id_nomina"] + 1;
        $no_nomina = " " . $id_nueva_nomina . rand(1,5000);
    }else{
        $id_nueva_nomina =  1;
        $no_nomina = " " . $id_nueva_nomina . rand(1,5000);
    }

    $consulta_nominas_id_temp = $conexion->query("SELECT no_nomina FROM $empresa.tbl_nomina_id_temp where id_nomina = 1");
    if($consulta_nominas_id_temp->num_rows >= 1 ){
        
    }else{
        $Reg_nominas_id_temp = $conexion->query("insert into $empresa.tbl_nomina_id_temp (no_nomina) values ($no_nomina) ");
    }

?>