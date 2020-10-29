<?php
    include("../conexion/cone.php");
    session_start();
    
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $nombre = $_POST["nombre"];
    $sucursal = $_POST["sucursal"];
    $insert_impuesto = $conexion->query("INSERT INTO $empresa.tbl_cajas (caja_nombre, caja_sucursal)
                                        VALUES ('$nombre', '$sucursal')");
    
    header("location:../../views/administracion/crear_caja.php?creado='si'");
?>