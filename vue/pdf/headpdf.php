<?php
// Include the main TCPDF library
require_once('dist/mpdf/mpdf.php');
$mpdf = new mPDF('c','', 0, '', 15, 3, 16, 16, 9, 9, 'P');
$mpdf->useSubstitutions=false;
