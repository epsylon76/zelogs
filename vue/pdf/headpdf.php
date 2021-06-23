<?php
// Include the main TCPDF library
require_once 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'orientation' => 'P',
    'format' => 'A4-P'
]);
$mpdf->useSubstitutions = false;
$mpdf->simpleTables = true;
