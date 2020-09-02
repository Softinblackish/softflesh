<?php
    include("../conexion/cone.php");
    $arti= $_POST['id'];     
    $nombre= $_POST['nombre']; 
    $descripcion=$_POST["descripcion"];
    $categoria=$_POST['categoria']; 
    $unidad=$_POST['unidad'];
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $conexion->query("UPDATE $empresa.articulos  SET nombre='$nombre', descripcion='$descripcion', categoria= '$categoria', unidad='$unidad' where id_articulo = $arti");
