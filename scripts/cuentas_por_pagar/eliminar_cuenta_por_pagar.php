<?php
include("../conexion/cone.php");

$id = $_GET['id'];
$eliminar= $conexion->query("delete from cuenta_por_pagar where id = $id");

header('location: ../../views/cuenta_por_pagar.php')

?>