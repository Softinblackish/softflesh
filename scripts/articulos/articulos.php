<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];
    $nombre= $_POST['nombre']; 
    $descripcion=$_POST["descripcion"]; 
    //$codigo=$_POST['codigo']; 
    $stop_min= $_POST['stop_min']; 
    $codigo_barra= $_POST['codigo_barra']; 
    $categoria=$_POST['categoria']; 
    $unidad=$_POST['unidad'];
    $impuesto = $_POST["impuesto"];
        //echo $empresa . "" .$nombre. "" .$descripcion. "" .$stop_min. "" .$codigo_barra .$categoria .$unidad .$impuesto;
    $Reg_articulos = $conexion->query( "INSERT into $empresa.tbl_articulos (nombre, descripcion, codigo_barra, cod_impuesto, stop_min,  categoria, unidad, codigo)
            values ('$nombre', '$descripcion', '$codigo_barra', '$impuesto' , $stop_min, 
            '$categoria','$unidad','0000')");

   header('location:../../views/articulos/frm_articulos.php?registro="si" ');
?>