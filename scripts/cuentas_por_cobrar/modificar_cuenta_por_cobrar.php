<?php
    include("../conexion/cone.php");
    session_start();
    $empresa= $_SESSION["empresa_db"];
    $id= $_POST['id'];     
    $nombre= $_POST['nombre']; 
    $detalle=$_POST["detalle"]; 
    $cantidad=$_POST['cantidad']; 
    $price= $_POST['price']; 
    $total= $_POST['total']; 

    $conexion->query("UPDATE tbl_cxp_cobrar  SET nombre='$nombre', detalle='$detalle', cantidad = '$cantidad', price='$price', total= '$total' where id = $id");