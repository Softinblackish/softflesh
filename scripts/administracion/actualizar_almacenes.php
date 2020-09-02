<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$nombre = $_POST["nombre"];
$ubicacion = $_POST["ubicacion"];
$id= $_POST["id"];
$descripcion = $_POST["descripcion"];
$encargado = $_POST["encargado"];
$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_almacenes set nombre_almacen = '$nombre', ubicacion_almacen='$ubicacion', descripcion_almacen='$descripcion', encargado_almacen= '$encargado' where id_almacen= $id ");
header("location:../../views/administracion/ver_almacenes.php");
?>