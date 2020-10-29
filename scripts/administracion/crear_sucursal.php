<?php
    include("../conexion/cone.php");
    session_start();
    
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $encargado = $_POST["encargado"];
    $direccion = $_POST["direccion"];
    $insert_impuesto = $conexion->query("INSERT INTO $empresa.tbl_sucursal (sucursal_nombre, sucursal_direccion, sucursal_encargado, sucursal_telefono)
                                        VALUES ('$nombre', '$direccion', '$encargado','$telefono')");
    
    header("location:../../views/administracion/crear_sucursal.php?creado='si'");
?>