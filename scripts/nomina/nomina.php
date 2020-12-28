<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    //cabeza inicial de la nomina.
    $no_nomina= $_POST['no_nomina'];

    //Datos de la nomina como tal.
    $salario_base= $_POST['salario_base']; 
    $salario_dia= $_POST['salario_dia'];
    $salario_hora= $_POST['salario_hora'];
    $empleado= $_POST['empleado'];
    $hora_extra= $_POST['hora_extra']; 
    $departamento = $_POST['departamento'];
    $puesto= $_POST['puesto'];
    $dias_laborables= $_POST['dias_laborables'];
    $turno= $_POST['turno'];
    $pension= $_POST['pension'];
    $salud= $_POST['salud'];
    $ars = $_POST['ars']; 
    $vacaciones= $_POST['vacaciones'];
    $cesantia= $_POST['cesantia'];
    $sueldo= $_POST['sueldo'];
    //$percepciones= $_POST['percepciones'];
    //$total_percepcion= $_POST['total_percepcion'];
    //$deduciones= $_POST['deduciones'];
    //$total_deduciones= $_POST['total_deduciones'];
    $horas_trabajadas=$_POST['horas_trabajadas'];
    $cedula=$_POST['cedula'];
    $estado=$_POST['estado'];
    /*
    $tabla_articulo = $conexion->query("
    CREATE TABLE $nombre_sin_espacio.tbl_articulos (
    `id_nomina` int(11) NOT NULL AUTO_INCREMENT,
    `empleado` varchar(100),
    `salario_base` Double,
    `salario_dia` DOUBLE,
    `salario_hora` DOUBLE,
    `hora_extra` DOUBLE,
    `departamento` varchar(100),
    `puesto` varchar(100),
    `dias_laborables` varchar(100),
    `turno` varchar(50),
    `pension` DOUBLE,
    `salud` DOUBLE,
    `ars` varchar(100),
    `vacasiones` DOUBLE,
    `cesantia` DOUBLE,
    `sueldo` DOUBLE,
    `no_nomina` int(11),
    `horas_trabajadas` int(11),
    `cedula` varchar(18),
    `estado` varchar(50),
    `fecha_creacion` timestamp DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY (`id_nomina`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8
  ");*/

        $consulta_cedula = $conexion->query("SELECT cedula FROM $empresa.tbl_nomina where cedula = '$cedula' and no_nomina = $no_nomina ");
        //$registro_det_nominas = $consulta_cedula->fetch_assoc();
        if($consulta_cedula->num_rows >= 1 ){
            
        }else{
        $Reg_nomina = $conexion->query("insert into $empresa.tbl_nomina (no_nomina,empleado,salario_base,salario_dia,salario_hora,hora_extra, departamento, puesto, dias_laborables, turno, pension, salud,ars,vacaciones,cesantia,sueldo,horas_trabajadas,cedula,estado) values ($no_nomina,'$empleado',$salario_base,$salario_dia,$salario_hora,$hora_extra,'$departamento', '$puesto', '$dias_laborables','$turno',$pension, $salud,'$ars',$vacaciones,$cesantia,$sueldo,$horas_trabajadas,'$cedula','$estado')");
        }
        
     echo $no_nomina." ".$empleado." ".$salario_base." ".$salario_dia." ".$salario_hora." ".$hora_extra." ".$departamento." ".$puesto." ".$dias_laborables." ".$turno." ".$pension." ".$salud." ".$ars." ".$vacaciones." ".$cesantia." ".$sueldo." ".$horas_trabajadas." ".$estado." ".$cedula." <br>";

     //echo $empresa . "  " .$no_nomina."  ".$ars."  ".$salario_hora."  ".$puesto."  ".$dias_laborables."  ".$salud."  ".$vacaciones."  ".$turno." ";
    //$Act_salud = $conexion->query("UPDATE $empresa.tbl_nominas set salud = $salud where no_nomina = $no_nomina ");


    header('location:../../views/nomina/frm_empleados.php?registro="si" ')
?>