<?php
    include("../conexion/cone.php");

    $nombre_sup= $_POST['nombre_sup']; 
    $articulo=$_POST["articulo"];
    $descripcion_sup=$_POST['descripcion_sup']; 
    $precio= $_POST['precio']; 
    $unidad= $_POST['unidad'];
    $telefono= $_POST['telefono'];
    $direccion= $_POST['direccion'];
    session_start();
    $empresa= $_SESSION["empresa_db"];
   
        $conexion->query("insert into $empresa.tbl_suplidores (nombre_sub, articulo, descripcion_sub, precio, unidad, telefono, direccion)
            values ('$nombre_sub', '$articulo', '$descripcion_sup', '$precio', '$unidad', '$telefono', '$direccion')");
    
//cxcobrar y cxpagar
    header('location: ../../views/suplidores/suplidores.php?registro="si"')
?>