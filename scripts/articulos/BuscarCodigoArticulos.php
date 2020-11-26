<?php
include("../conexion/cone.php");
session_start();
$empresa = $_SESSION["empresa_db"];

//echo $_POST["proveedor"];

try {

    if(isset($_POST["proveedor"])) {    
        $proveedor = $_POST["proveedor"];
        $consulta_proveedors= $conexion->query("SELECT codigo_sup FROM $empresa.tbl_suplidores WHERE nombre_sup LIKE '%$proveedor%' limit 1");
                             
    }else{
        //$consulta_proveedors= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
    }
    $productos = array();
    if($consulta_proveedors->num_rows >= 1){
        while($rows = $consulta_proveedors->fetch_assoc()) $productos[] = $rows;
    //echo $productos;
    echo json_encode($productos);
    }else{
        echo "No se tiene datos de ese proveedor";
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}



?>