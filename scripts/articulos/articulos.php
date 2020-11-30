<?php
    include("../conexion/cone.php");
    session_start();
    $empresa = $_SESSION["empresa_db"];

    $nombre=$_POST['nombre']; 
    $precio_compra=$_POST['precio_compra'];
    $precio=$_POST['precio'];
    $ganancia=$_POST['ganancia'];
    $descripcion=$_POST["nota"]; 
    $cod_impuesto=$_POST['cod_impuesto']; 
    $stop_min=$_POST['stop_min']; 
    $cantidad_actual=$_POST['cantidad_actual']; 
    $codigo_barra= $_POST['codigo_barra']; 
    $categoria=$_POST['categoria']; 
    $unidad=$_POST['unidad'];
   
    $lista_impuestos = $conexion->query("SELECT * FROM $empresa.tbl_cod_impuestos WHERE id_cod_impuesto = $cod_impuesto");
    $resultado_impuesto = $lista_impuestos->fetch_assoc();
    $impuestos =$resultado_impuesto["porciento"]/100;
    $valor_impuestos = $impuestos * $precio;
    $precio_total = $valor_impuestos + $precio;
   
     
    //echo $empresa . "   " .$nombre. "   ".$precio."  ".$precio_compra."     ".$precio_venta."     ".$ganancia."    ".$descripcion. "   " .$stop_min. "   " .$codigo_barra."   ".$categoria."   ".$unidad. "   ".$cod_impuesto;
  
    $Reg_articulos = $conexion->query( "INSERT into $empresa.tbl_articulos (nombre, precio, precio_compra, descripcion, codigo_barra, cod_impuesto, stop_min, cantidad_actual, categoria, unidad, status)
<<<<<<< HEAD
            values ('$nombre', $precio_total, $precio_compra, '$descripcion', '$codigo_barra', '$cod_impuesto', $stop_min, $cantidad_actual,'$categoria','$unidad','ACTIVO')");
=======
            values ('$nombre', $precio_total, $precio_compra, $ganancia, '$descripcion', '$codigo_barra', '$cod_impuesto', $stop_min, $cantidad_actual,'$categoria','$unidad','ACTIVO')");
>>>>>>> d6d0f1a12bb3eda177afff0700fc2bff789fdccf

   header('location:../../views/articulos/frm_articulos.php?registro="no" ');

?>