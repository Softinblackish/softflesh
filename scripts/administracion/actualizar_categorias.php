<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$nombre = $_POST["nombre"];
$id= $_POST["id"];
$descripcion = $_POST["descripcion"];

$actualizar_impuestos=$conexion->query("UPDATE $empresa.tbl_categorias set nombre_categoria = '$nombre', descripcion_categoria = '$descripcion' where id_categoria = $id ");
header("location:../../views/administracion/ver_categorias.php");
?>