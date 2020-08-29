<?php
    include("../conexion/cone.php");
    session_start();
    $nombre_impuesto = $_POST["codigo"];
    $valor_impuesto = $_POST["porciento"];
    $descripcion = $_POST["descripcion"];
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];
    $insert_impuesto = $conexion->query("INSERT INTO $empresa.tbl_cod_impuestos (nom_codigo, porciento, descripcion, creado_por) VALUES ('$nombre_impuesto','$valor_impuesto', '$descripcion','$usuario')");
    
    header("location:../../views/administracion/crear_impuesto.php?creado='si'");
?>