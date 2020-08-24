<?php
    include("../conexion/cone.php");


   $nombre_articulos = $_POST["nombre"];
   var resultado;
        resultado = $conexion->query("select nombre,codigo,descripcion,cod_impuesto,categoria,unidad from articulos");
    

    header('location: ../../views/articulos/articulos.php')
?>