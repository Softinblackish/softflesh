<?php
include("../conexion/cone.php");

session_start();
$empresa= $_SESSION["empresa_db"];


$limite = $_POST["limite"];
$tipo = $_POST["tipo"];
$cantidad_alerta = $_POST["alerta"];

$consulta=$conexion->query("SELECT maximo FROM $empresa.tbl_comprobantes where tipo = '$tipo'");
$registros = $consulta->fetch_assoc();

echo $registros["maximo"]. " ". $limite;

if($registros["maximo"] < $limite)
{
    $conexion->query("UPDATE $empresa.tbl_comprobantes SET maximo = $limite, cantidad_alerta = $cantidad_alerta WHERE tipo='$tipo' ");
    header("Location:../../views/administracion/comprobantes.php?tipo=$tipo");
}
else
{
header("Location:../../views/administracion/comprobantes.php?tipo=$tipo & error_menor='si'");
}


?>