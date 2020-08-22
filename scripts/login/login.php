<?php
include("../conexion/cone.php");

$user= $_POST['user'];
$password = $_POST['pass'];

$validation_name = $conexion->query("select * from tbl_usuario where nombre_usuario = '$user'");
$verificacion_name = $validation_name->num_rows;
if($verificacion_name >= 1)
{
    $validation_pass = $conexion->query("select * from tbl_usuario where contraseña_usuario = '$password'");
    $verificacion_pass = $validation_pass->num_rows;
    if($verificacion_pass >= 1)
        {
            session_start();
            $_SESSION["user"] = $user;
            echo $_SESSION["user"];
            header("location:../../views/dashboard/dashboard.php");
        }
    else
    {
        echo(" Password incorrecto");
    }
    
}
else
{
    echo("Usuario no encontrado");
}

?>