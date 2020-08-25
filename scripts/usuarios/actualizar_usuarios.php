<?php
    include("../conexion/cone.php");
    session_start();
$empresa = $_SESSION["empresa_db"];
$nombre = $_POST["nombre"];
$cedula = $_POST["cedula"];
$id= $_POST["id"];
$sucursal = $_POST["sucursal"];
$rol= $_POST["rol"];
$status = $_POST["status"];
echo $nombre; 
$horario = $_POST["horario"];
$actualizar_usuario=$conexion->query("UPDATE $empresa.tbl_usuario set nombre = '$nombre', cedula_usuario='$cedula', horario='$horario', sucursal_usuario='$sucursal', rol_usuario = '$rol', status= '$status' where id_usuario= $id ");
header("location:../../views/usuarios/lista_usuarios.php");
?>