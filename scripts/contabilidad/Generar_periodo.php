<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];

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

    function proceso($año){
    include("../conexion/cone.php");
    $empresa= $_SESSION["empresa_db"];

        $cadena = general($año);
        $trozos = explode("\n", $cadena);
        for ($i=0; $i < count($trozos); $i++) { 
            echo $trozos[$i]."<br>";
            $accion = $conexion->query("insert into $empresa.tbl_help_606(periodo) values ($trozos[$i])");
        }
    }

    

    function inicio($anio_inicial,$anio_final){
        
        do{
            echo $anio_inicial."<br>";
            proceso($anio_inicial);
            $anio_inicial --;
        }while($anio_final <= $anio_inicial);
            
    }
    
    
 /*
    $tabla_help_606 = $conexion->query("
    CREATE TABLE $nombre_sin_espacio.tbl_help_606 (
      `id_help_606` int(11) NOT NULL AUTO_INCREMENT ,
      `t_bienes_and_services`,
      `periodo` varchar(200) ,
      PRIMARY KEY (`id_help_606`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8
    ");    
 */
    
        
        $consulta = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606");
        if($consulta->num_rows >= 1 ){

            $var_consulta = $año."01";
            $consulta2 = $conexion->query("SELECT periodo FROM $empresa.tbl_help_606 where periodo = $var_consulta");
            if($consulta->num_rows >= 1){

            }else{
                $consulta2 = $conexion->query("truncate table $empresa.tbl_help_606");
                inicio($año,2007);
            }
        }else{
            inicio($año,2007);
        }

    header('location:../../views/contabilidad/frm_llenado_606.php?registro="si" ')
?>