<?php
    include("../conexion/cone.php");
    session_start();
    $nombre = $_POST["nombre"];
    $ubicacion = $_POST["ubicacion"];
    $encargado = $_POST["encargado"];
    $descripcion = $_POST["descripcion"];
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];
    $insert_impuesto = $conexion->query("INSERT INTO $empresa.tbl_almacenes
                       (nombre_almacen, descripcion_almacen, ubicacion_almacen, encargado_almacen,creado_por)
                       VALUES ('$nombre','$descripcion', '$ubicacion','$encargado','$usuario')");
    
    header("location:../../views/administracion/crear_almacenes.php?creado='si'");
?>