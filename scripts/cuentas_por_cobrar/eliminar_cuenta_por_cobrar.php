<?php
include("../conexion/cone.php");

$id = $_GET['id'];
$eliminar= $conexion->query("delete from cuenta_por_cobrar where id = $id");

header('location: ../../views/cuenta_por_cobrar.php')

?>