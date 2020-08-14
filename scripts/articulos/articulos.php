<?php
    include("../conexion/cone.php");

    $nombre= $_POST['nombre']; $descripcion=$_POST["descripcion"]; $codigo=$_POST['codigo']; $referencia= $_POST['referencia']; $codigo_barra= $_POST['codigo_barra']; $categoria=$_POST['categoria']; $almacen=$_POST['almacen'];
   $impuesto = $_POST["impuesto"];
        $conexion->query("insert into articulos (nombre, descripcion, codigo,cod_impuesto, referencia, codigo_barra, categoria, almacen)
            values ('$nombre', '$descripcion', '$codigo', $impuesto , '$referencia', '$codigo_barra','$categoria','$almacen')");
    

    header('location: ../../views/articulos/articulos.php')
?>