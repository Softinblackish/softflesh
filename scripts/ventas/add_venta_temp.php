<?php
    include("../conexion/cone.php");
    session_start();
    $empresa=$_SESSION["empresa_db"];
    $usuario = $_SESSION["user"];

    $cod=$_GET["cod"];
    $nom=$_GET["nom"];
    $cantidad= $_GET["cant"];

    if(isset($_GET["id"]))
    {
        $id_temp = $_GET["id"];
    }
    else
    {
        $id_temp = random_int(1,99999999);
        $confirmar_existencia = $conexion->query("SELECT * from $empresa.tbl_venta_temp WHERE id_venta = $id_temp");
        $resultado_existencia= $confirmar_existencia->fetch_assoc();
        if($resultado_existencia > 0)
        {
            echo "ya existe";
            $id_temp = random_int(99999999,999999999999);
        }
    
    }
    $consulta_articulos=$conexion->query("SELECT cantidad_disponible FROM $empresa.tbl_articulos where id_articulo = $cod");
    $registro_articulos = $consulta_articulos->fetch_assoc();

    if($registro_articulos["cantidad_disponible"] > 0)
    {
        $confirmar_existencia2 = $conexion->query("SELECT * from $empresa.tbl_venta_temp WHERE id_venta = $id_temp and id_articulo = $cod");
        $existe = $confirmar_existencia2->num_rows;
        $resultado_existencia2 = $confirmar_existencia2->fetch_assoc();
       if($existe > 0)
        {
            if($resultado_existencia2["cantidad"] <= $registro_articulos["cantidad_disponible"]-1)
            {
                $nueva_cantidad = $resultado_existencia2["cantidad"] + $cantidad;
                $itbis = $_GET["itbis"] * $nueva_cantidad;
                $precio = $_GET["precio"]* $nueva_cantidad;
                $total = $itbis + $precio;
                $actualizar_temp = $conexion->query("UPDATE $empresa.tbl_venta_temp SET cantidad = $nueva_cantidad, itbis = $itbis, precio = $precio, total = $total WHERE id_venta = $id_temp and id_articulo = $cod");
                if(isset($_GET['cotizacion']))
                {
                    header("location:../../views/venta/cotizaciones.php?id_temp=$id_temp");

                }
                else
                {
                    header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp");
                }
            }
            else
            {
                #header("location:../../views/venta/cotizaciones.php?id_temp=$id_temp&disponible=$precio");
            }

        }
        else{
            if(isset($_GET['cotizacion']))
            {
                $cotizacion = 1;
            }
            else{
                $cotizacion = 0;
            }
            $itbis = $_GET["itbis"] * $cantidad;
            $precio = $_GET["precio"]* $cantidad;
            $total = $itbis + $precio;
            
            $insert_venta_temp = $conexion->query("INSERT into $empresa.tbl_venta_temp (id_venta,id_articulo, articulo, itbis, precio, cantidad, total, cotizacion, creado_por) Values ($id_temp, $cod, '$nom', $itbis, $precio, $cantidad, $total, $cotizacion, '$usuario')");
            if(isset($_GET['cotizacion']))
            {
                header("location:../../views/venta/cotizaciones.php?id_temp=$id_temp");

            }
            else
            {
                header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp");
            }
        }
    }
    else
    {
        if(isset($_GET['cotizacion']))
        {
            header("location:../../views/venta/cotizaciones.php?id_temp=$id_temp&disponible=$precio");

        }
        else
        {
           header("location:../../views/venta/punto_de_venta.php?id_temp=$id_temp&disponible=$precio");
        }
    }
?>
