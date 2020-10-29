<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$id= $_POST["id"];
$nombre = $_POST["nombre"];
$sucursal = $_POST["sucursal"];

$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_cajas set caja_nombre = '$nombre', caja_sucursal = '$sucursal' where id_caja = $id ");
header("location:../../views/administracion/ver_cajas.php");
?>