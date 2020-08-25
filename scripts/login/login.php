<?php
include("../conexion/cone.php");
$empresa = $_POST["empresa"];
$user= $_POST['user'];
$password = $_POST['pass'];
$empresa_sin_espacio= str_replace(" ", "_",$empresa);

$validation_name = $conexion->query("select * from $empresa_sin_espacio.tbl_usuario where nombre_usuario = '$user' and contraseña_usuario = '$password'");
$verificacion_name = $validation_name->num_rows;
if($verificacion_name >= 1)
{
    session_start();
    $_SESSION["user"]= $user; 
    $_SESSION["empresa"]=$empresa;
    $_SESSION["empresa_db"] = $empresa_sin_espacio;
    header("location:../../views/dashboard/dashboard.php"); 

}
else
{
    header("location:../../views/login/login.php?error=true");
}

?>