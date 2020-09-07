<?php
    include("../conexion/cone.php");
    session_start();
    $empresa=$_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cod=$_GET["cod"];
    $nom=$_GET["nom"];
    $cantidad= $_GET["cant"];
    $itbis = $_GET["itbis"] * $cantidad;
    $precio = $_GET["precio"]* $cantidad;
    $total = $itbis + $precio;
    if(isset($_GET["id"]))
    {
        $id_temp = $_GET["id"];
    }
    else
    {
        $id_temp = random_int(1,100000);
    }
    
    echo $id_temp;
    $insert_venta_temp = $conexion->query("INSERT into $empresa.venta_temp (id_venta, id_temp, articulo, itbis, precio, cantidad, total, creado_por) Values ($id_temp, '$nom', $itbis,$precio, $cantidad,$total, '$usuario')");

   header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp");
?>