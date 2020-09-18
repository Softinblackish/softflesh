<?php
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];

if(isset($_POST["articulo"]))
{
    $art=$_POST["articulo"];
    $consulta_articulos = $conexion->query("SELECT precio,stop_min FROM $empresa.tbl_articulos where nombre = $art limit 1 ");
    
}else
{
    $precio_art = " ";
    $stop_min_art = " ";
    //$consulta_articulos = $conexion->query("SELECT precio,stop_min FROM $empresa.tbl_articulos limit 1 ");
}

while($reg_art_temp = $consulta_articulos->fetch_assoc()) {
        $precio_art   = $reg_art_temp["precio"];
        $stop_min_art = $reg_art_temp["stop_min"];
}

echo $precio_art;
echo $stop_min_art;

?>