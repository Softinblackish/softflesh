<?php
include("../conexion/cone.php");
session_start();
$nombre= $_POST['rol'];
$descripcion= $_POST["descripcion"];
$empresa= $_SESSION["empresa_db"];
$conexion->query("insert into $empresa.roles (nombre_rol, descripcion_rol) values ('$nombre', '$descripcion')");
$agregar_rol_permisos = $conexion->query("INSERT INTO $empresa.tbl_permisos (rol) value ('$nombre')");
header("location:../../views/administracion/administracion.php");
 ?>