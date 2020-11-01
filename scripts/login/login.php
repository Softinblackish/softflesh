<?php
include("../conexion/cone.php");
$empresa = $_POST["empresa"];
$user= $_POST['user'];
$password = $_POST['pass'];
$empresa_sin_espacio= str_replace(" ", "_",$empresa);
$ultimo_catacter = substr($empresa_sin_espacio,-1) ;
echo $ultimo_catacter;
if($ultimo_catacter== "_")
{
    while($ultimo_catacter == "_")
    {
        $empresa_sin_espacio= substr($empresa_sin_espacio, 0, -1);
        $ultimo_catacter= substr($empresa_sin_espacio, -1);
    }
}

$validation_name = $conexion->query("select * from $empresa_sin_espacio.tbl_usuario where nombre_usuario = '$user' and contrasena_usuario = '$password'");
if($verificacion_name = $validation_name->num_rows){
$informacion_user= $validation_name->fetch_assoc();
$rol=$informacion_user["rol_usuario"];

if($verificacion_name >= 1)
{
    session_start();
    $ip = $_SERVER['REMOTE_ADDR'];
    $_SESSION['caja']= $ip;
    $_SESSION["user"]= $user;
    $_SESSION['rol']= $rol;
    $_SESSION["empresa"]=$empresa;
    $_SESSION["empresa_db"] = $empresa_sin_espacio;
    header("location:../../views/dashboard/dashboard.php"); 

}
else
{
    header("location:../../views/login/login.php?error=true");
}

}


?>