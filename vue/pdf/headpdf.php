<?php
// Include the main TCPDF library
require_once('dist/mpdf/mpdf.php');
$mpdf = new mPDF('c','', 0, '', 13, 3, 0, 2, 9, 9, 'P');
$mpdf->useSubstitutions=false;
