<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$encargado = $_POST["encargado"];
$id= $_POST["id"];
$direccion = $_POST["direccion"];

$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_sucursal set sucursal_nombre = '$nombre', sucursal_direccion = '$direccion',sucursal_telefono = '$telefono',sucursal_encargado = '$encargado' where id_sucursal = $id ");
header("location:../../views/administracion/ver_sucursales.php");
?>