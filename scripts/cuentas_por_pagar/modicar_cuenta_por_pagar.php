<?php
    include("../conexion/cone.php");
    $id= $_POST['id'];     
    $nombre= $_POST['nombre']; 
    $detalle=$_POST["detalle"]; 
    $cantidad=$_POST['cantidad']; 
    $price= $_POST['price']; 
    $total= $_POST['total']; 

    $conexion->query("UPDATE cuentas_por_pagar  SET nombre='$nombre', detalle='$detalle', cantidad = '$cantidad', price='$price', total= '$total' where id = $id");