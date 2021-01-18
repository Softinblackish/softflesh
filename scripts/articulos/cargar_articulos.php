<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];

    $nombre=$_POST['nombre']; 
    $precio=$_POST['precio'];
    $descripcion=$_POST["nota"]; 
    $cantidad_actual=$_POST['cantidad_actual']; 
    $codigo_barra= $_POST['codigo_barra']; 
   
    //echo $empresa . "   " .$nombre. "     ".$precio."       ".$descripcion. "   ".$cantidad_actual."  " .$codigo_barra;
  
    $Reg_articulos = $conexion->query( "INSERT into $empresa.tbl_articulos (nombre, precio, descripcion, codigo_barra, cantidad_actual, status)
            values ('$nombre', $precio, '$descripcion', '$codigo_barra', $cantidad_actual,'ACTIVO')");

   header('location:../../views/articulos/frm_cargar_articulos.php?registro="no" ');

?>