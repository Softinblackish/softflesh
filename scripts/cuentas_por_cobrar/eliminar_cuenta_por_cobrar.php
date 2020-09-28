<?php
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];
$id = $_GET['id'];
$eliminar= $conexion->query("delete from tbl_cxp_cobrar where id = $id");

header('location: ../../views/cuenta_por_cobrar.php')

?>