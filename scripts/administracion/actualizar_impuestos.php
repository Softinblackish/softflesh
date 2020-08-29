<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$nombre = $_POST["nombre"];
$porciento = $_POST["porciento"];
$id= $_POST["id"];
$descripcion = $_POST["descripcion"];
$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_cod_impuestos set nom_codigo = '$nombre', porciento='$porciento', descripcion='$descripcion' where id_cod_impuesto= $id ");
header("location:../../views/administracion/ver_impuestos.php");
?>