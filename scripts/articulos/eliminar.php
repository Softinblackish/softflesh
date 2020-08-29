<?php
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];
$id=$_GET["id"];
$eliminar= $conexion->query("delete from $empresa.articulos where id_articulo = $id");

header('location: ../../views/articulos.php')

?>