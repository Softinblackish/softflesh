<?php
    include("../conexion/cone.php");
    session_start();
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $empresa = $_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];
    $insert_impuesto = $conexion->query("INSERT INTO $empresa.tbl_categorias (nombre_categoria, descripcion_categoria, creada_por)
                                        VALUES ('$nombre','$descripcion', '$usuario')");
    
    header("location:../../views/administracion/crear_categorias.php?creado='si'");
?>