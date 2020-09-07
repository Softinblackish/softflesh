<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];

    $nombre=$_POST['nombre']; 
    $descripcion=$_POST["descripcion"]; 
    $cod_impuesto=$_POST['cod_impuesto']; 
    $stop_min=$_POST['stop_min']; 
    $codigo_barra= $_POST['codigo_barra']; 
    $categoria=$_POST['categoria']; 
    $unidad=$_POST['unidad'];
   

    //echo $empresa . "" .$nombre. "" .$descripcion. "" .$stop_min. "" .$codigo_barra .$categoria .$unidad .$impuesto;
    
    $Reg_articulos = $conexion->query( "INSERT into $empresa.tbl_articulos (nombre, descripcion, codigo_barra, cod_impuesto, stop_min,  categoria, unidad, status)
            values ('$nombre', '$descripcion', '$codigo_barra', '$cod_impuesto', $stop_min,'$categoria','$unidad','ACTIVO')");

   header('location:../../views/articulos/frm_articulos.php?registro="si" ');

?>