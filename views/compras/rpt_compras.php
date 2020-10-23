<?php

require_once('../../scripts/pdf/vendor/autoload.php');
require_once('plantilla_reporte/plantilla_compras.php');

$mpdf = new \Mpdf\Mpdf();
$plantilla = getPlantilla();
$css = file_get_contents("plantilla_reporte/style.css");
$mpdf->WriteHTML($css,\Mpdf\HTMLparserMode::HEADER_CSS);
$mpdf->WriteHTML($plantilla,\Mpdf\HTMLparserMode::HTML_BODY);
$mpdf->Output('compras.pdf','I');

?>