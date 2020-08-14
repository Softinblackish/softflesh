<?php
include("../conexion/cone.php");

$id = $_GET['id'];
$eliminar= $conexion->query("delete from articulos where id_articulo = $id");

header('location: ../../views/articulos.php')

?>