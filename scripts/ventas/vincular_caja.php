<?php
     include("../conexion/cone.php");
     session_start();
     $empresa= $_SESSION["empresa_db"];
     
     $ip = $_SERVER['REMOTE_ADDR'];

     $id = $_GET["caja"];
     echo $_SERVER['REMOTE_ADDR'];

     $vincular = $conexion->query("UPDATE $empresa.tbl_cajas SET ip = '$ip' where id_caja = $id");

     header("location:../../views/venta/cierre_ventas.php");
?>