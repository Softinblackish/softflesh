<?php 
include('../conexion/cone.php');
session_start();
$empresa = $_SESSION['empresa_db'];

    $id_temp= $_GET['name'];

    $delete = $conexion->query("DELETE FROM $empresa.tbl_asientos WHERE id_temp = '$id_temp'");
    
    header('location: ../../views/administracion/asientos_contables.php');
?>