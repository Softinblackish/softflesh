<?php

require_once('../../scripts/pdf/vendor/autoload.php');
require_once('plantilla_reporte/plantilla_compras.php');

$desde = empty($_POST['desde']) ? '0000-00-00' : $_POST['desde'];
$hasta = empty($_POST['hasta']) ? '0000-00-00' : $_POST['hasta'];
$filtro = $_POST['filtro'];

$mpdf = new \Mpdf\Mpdf();
$plantilla = getPlantilla($desde,$hasta,$filtro);
$css = file_get_contents("plantilla_reporte/style.css");
$mpdf->WriteHTML($css,\Mpdf\HTMLparserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla,\Mpdf\HTMLparserMode::HTML_BODY);
$mpdf->Output('compras.pdf','I');

?>