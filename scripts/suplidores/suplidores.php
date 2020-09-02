<?php
    include("../conexion/cone.php");

    $nombre_sup= $_POST['nombre_sup']; 
    $articulo=$_POST["articulo"];
    $descripcion_sup=$_POST['descripcion_sup']; 
    $precio= $_POST['precio']; 
    $unidad= $_POST['unidad'];
    $telefono= $_POST['telefono'];
    $direccion= $_POST['direccion'];
   
        $conexion->query("insert into tbl_suplidores (nombre_sub, articulo, descripcion_sub, precio, unidad, telefono, direccion)
            values ('$nombre_sub', '$articulo', '$descripcion_sup', '$precio', '$unidad', '$telefono', '$direccion')");
    
//cxcobrar y cxpagar
    header('location: ../../views/suplidores/suplidores.php')
?>