<?php

include("../../scripts/conexion/cone.php");
session_start();
$empresa = $_SESSION["empresa_db"];


require_once('../../scripts/pdf/vendor/autoload.php');
require_once('plantilla_reporte/plantilla_compras.php');

$desde  =  isset($_GET['desde']) ? $_GET['desde'] : '0000-00-00';
$hasta  =  isset($_GET['hasta']) ? $_GET['hasta'] : '0000-00-00';
$filtro =  isset($_GET['filtro'])? $_GET['filtro']: '1';


try {
        if( isset($_POST["desde"]) || isset($_POST["hasta"]) || isset($_POST["filtro"]) )
        {
            if($desde and $hasta )
                {
                    //$desde = $desde;
                    //$hasta = $hasta;
                    $consulta_articulos= $conexion->query("SELECT * from $empresa.tbl_compras WHERE fecha_creacion >= '$desde' and fecha_creacion <= '$hasta' ");
                }
            if($filtro)
                {
                    $filtro = $filtro;
                    $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras WHERE no_compra LIKE '%$filtro%' limit 5");
                }                  
        }else{
            $consulta_articulos= $conexion->query("SELECT * FROM $empresa.tbl_art_compras");
        }
 
        $productos = array();
        if($consulta_articulos->num_rows >= 1){
            
            while($rows = $consulta_articulos->fetch_assoc()) $productos[] = $rows;
        }
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
        //var_dump($productos);
        //die();

//var_dump($desde,$hasta,$filtro);
//echo "--------------->".$desde." ".$hasta." ".$filtro;

$mpdf = new \Mpdf\Mpdf();
//plantilla html
$plantilla = getPlantilla($productos);
//css de la plantilla
$css = file_get_contents("plantilla_reporte/style.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($css,\Mpdf\HTMLparserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla,\Mpdf\HTMLparserMode::HTML_BODY);
$mpdf->Output('compras.pdf','I');

?>