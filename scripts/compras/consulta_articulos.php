<?php
/*
include("../conexion/cone.php");
session_start();
$empresa= $_SESSION["empresa_db"];

$precio_art = 0;
$stop_min_art = 0;
print($_POST["articulo"]);
if(isset($_POST["articulo"]))
{
    $art=$_POST["articulo"];
    $consulta_articulos = $conexion->query("SELECT precio,stop_min FROM $empresa.tbl_articulos where nombre = "$art" limit 1 ");

    while($reg_art_temp = $consulta_articulos->fetch_assoc()) {
        $precio_art   = $reg_art_temp["precio"];
        $stop_min_art = $reg_art_temp["stop_min"];
    }
    
}

echo $precio_art, $stop_min_art;
*/
//print("Estoy en php");
echo $_POST["articulo"];
//echo "hola";
?>