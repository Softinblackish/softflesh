<?php
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];
$id=$_GET["id"];
$eliminar= $conexion->query("delete from $empresa.tbl_articulos where id_articulo = $id");

header('location: ../../views/articulos/frm_consultar_articulos.php')

?>