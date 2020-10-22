<?php

require_once('../../scripts/pdf/vendor/autoload.php');

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1> Reporte de Compras </h1>');
$mpdf->Output('compras.pdf','I');

?>