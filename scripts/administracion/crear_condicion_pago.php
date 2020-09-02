<?php
    include("../conexion/cone.php");
    session_start();
    $nombre = $_POST["nombre"];
    $dia = $_POST["dias"];
    $descripcion = $_POST["descripcion"];
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];
    $insert_condicion = $conexion->query("INSERT INTO $empresa.tbl_condiciones_pago
                       (nombre_condicion_p, descripcion_condicion_p, dias_condicion_p, creado_por)
                       VALUES ('$nombre','$descripcion', '$dia','$usuario')");
    
    header("location:../../views/administracion/crear_almacenes.php?creado='si'");
?>