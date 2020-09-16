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
        $id_temp = random_int(1,99999999);
        $confirmar_existencia = $conexion->query("SELECT id_venta from $empresa.tbl_venta_temp WHERE id_venta = $id_temp");
        $resultado_existencia= $confirmar_existencia->fetch_assoc();
        if($resultado_existencia > 0){
            echo "ya existe";
            $id_temp = random_int(99999999,999999999999);
        }
    
    }
    $consulta_articulos=$conexion->query("SELECT cantidad_disponible FROM $empresa.tbl_articulos where id_articulo = $cod");
    $registro_articulos = $consulta_articulos->fetch_assoc();
    if($registro_articulos["cantidad_disponible"] > 0)
    {
    echo $id_temp;
    $insert_venta_temp = $conexion->query("INSERT into $empresa.tbl_venta_temp (id_venta,id_articulo, articulo, itbis, precio, cantidad, total, creado_por) Values ($id_temp, $cod, '$nom', $itbis, $precio, $cantidad, $total, '$usuario')");
    header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp");
    }
    else{
    header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp&disponible=$precio");
    }
?>
