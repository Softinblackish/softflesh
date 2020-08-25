<?php
    include("../conexion/cone.php");

    $nombre= $_POST['nombre']; 
    $producto=$_POST["producto"]; 
    $descripcion=$_POST['descripcion']; 
    $precio= $_POST['precio']; 
    $unidad= $_POST['unidad'];
    $telefono= $_POST['telefono'];
    $direccion= $_POST['direccion']; 
    
   
        $conexion->query("insert into tbl_suplidores (sup_nombre, sup_producto, sup_descripcion, sup_precio, sup_unidad, sup_telefono, sup_direccion)
            values ('$nombre', '$producto', '$descripcion', '$precio', '$unidad', '$telefono', '$direccion')");
    
//cxcobrar y cxpagar
    header('location: ../../views/suplidores/suplidores.php')
?>