<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $nombre_articulos = $_POST["nombre"];
    $resultado = $conexion->query("select nombre, codigo, descripcion, cod_impuesto, categoria, unidad from $empresa.articulos");

    header('location: ../../views/articulos/articulos.php')
?>