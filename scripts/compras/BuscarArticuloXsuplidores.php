<?php
include("../conexion/cone.php");
session_start();
$empresa = $_SESSION["empresa_db"];

//echo $_POST["proveedor"];

try {

    if(isset($_POST["proveedor"])) {    
        $proveedor = $_POST["proveedor"];
        $consulta_proveedors= $conexion->query("SELECT nombre FROM $empresa.tbl_articulos WHERE cod_suplidor LIKE '%$proveedor%' ");
                             
    }else{
        //$consulta_proveedors= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
    }
    //$productos = array();
    //$lista='<option value = "0"> Elige una opcion </option>';
    $lista;
    if($consulta_proveedors->num_rows >= 1){
        while($row = $consulta_proveedors->fetch_assoc()) {
        $lista .="<option value='$row[nombre]'> $row[nombre] </option>";
    }
    //echo $productos;
    echo $lista;
    }else{
        echo "No se tiene datos de ese proveedor";
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

?>
