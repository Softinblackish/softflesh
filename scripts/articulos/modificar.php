<?php
    include("../conexion/cone.php");
    $arti= $_POST['id'];     
    $nombre= $_POST['nombre']; 
    $descripcion=$_POST["descripcion"];
 echo $arti;
     $referencia= $_POST['referencia']; 
     $codigo_barra= $_POST['codigo_barra'];
      $categoria=$_POST['categoria']; 
      $almacen=$_POST['almacen'];
    $conexion->query("UPDATE articulos  SET nombre='$nombre', descripcion='$descripcion', referencia= '$referencia', codigo_barra='$codigo_barra', categoria= '$categoria', almacen='$almacen' where id_articulo = $arti");
