<?php
    include("../conexion/cone.php");

    $id_sup= $_POST['id_sup'];     
    $nombre_sup= $_POST['nombre_sup']; 
    $articulo=$_POST["articulo"];
    $descripcion_sup=$_POST['descripcion_sup']; 
    $precio=$_POST['precio'];
    $unidad=$_POST['unidad']; 
    $telefono=$_POST['telefono'];
    $direccion=$_POST['direccion'];
    session_start();
    $empresa= $_SESSION["empresa_db"];
   
    $conexion->query("UPDATE $empresa.tbl_suplidores  SET nombre_sup='$nombre_sup', articulo='$articulo', descripcion_sup= '$descripcion_sup', precio= $precio , unidad = $unidad, telefono = '$telefono', direccion='$direccion'  where id_sup = $id_sup");