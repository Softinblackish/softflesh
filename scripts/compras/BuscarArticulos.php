<?php
include("../conexion/cone.php");
session_start();
$empresa = $_SESSION["empresa_db"];

//echo $_POST["articulo"];

try {
//precio,cantidad_actual,cod_impuesto,descripcion
    if(isset($_POST["articulo"])) {    
        $articulo = $_POST["articulo"];
        $consulta_articulos= $conexion->query("SELECT round(precio,0) as precio,cantidad_actual,cod_impuesto,descripcion FROM $empresa.tbl_articulos WHERE nombre LIKE '%$articulo%' limit 1");
                             
    }else{
        //$consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
    }
    $productos = array();
    if($consulta_articulos->num_rows >= 1){
        while($rows = $consulta_articulos->fetch_assoc()) $productos[] = $rows;
    //echo $productos;
    echo json_encode($productos);
    }else{
        echo "No se tiene datos de ese articulo";
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}



?>