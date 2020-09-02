<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$nombre = $_POST["nombre"];
$dias = $_POST["dias"];
$id= $_POST["id"];
$descripcion = $_POST["descripcion"];

$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_condiciones_pago set nombre_condicion_p = '$nombre', descripcion_condicion_p = '$descripcion', dias_condicion_p = '$dias' where id_condicion_p = $id ");
header("location:../../views/administracion/ver_condiciones_pago.php");
?>