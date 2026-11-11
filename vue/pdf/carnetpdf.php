<?php
set_time_limit(500);
//deux tableaux de 10 lignes par page A4
$page = 1;
$html = '<!DOCTYPE html>
<html lang="fr"><head><meta charset="utf-8"><title>Carnet de sauts</title>
<style>
@page {
  size: A4 portrait;
  margin: 5mm 10mm 5mm 10mm;
}
body{margin:0;}
table{
  width:100%;
  font-family:"Courier New",Courier,"Liberation Mono",monospace;
  font-size:10px;
  font-weight:bold;
  text-align:center;
  border-collapse:collapse;
  height:117mm;
  page-break-inside:avoid;
}
td{
    /* mPDF (simpleTables) encadrait toutes les cellules : on garde ce rendu */
    border:0.5px solid black !important;
    padding:0 1px;
    line-height:1.15;
}
.t1{width:15mm;}
.ts{width:25mm;}
/* 2 lignes en-tete + 13 lignes = 117 mm, comme le rendu mPDF */
.haut1{height:4.5mm;}
.haut2{height:8.3mm;}
hr{margin-top:0mm;margin-bottom:0mm;}
/* les <br> du modele remplaces par une marge fixe : evite le debordement sur une page blanche */
body > br{display:none;}
table{margin:5mm 0 3mm 0;}
.saut-page{page-break-before:always;}
</style></head><body>';
//pour chaque page on genere tant qu'il reste des lignes à afficher
//c'est à dire que $cle<=$maxligne

while ($cle <= $maxligne) {
  if ($page == 3) {
    $html .= '<div class="saut-page"></div>';
    $page = 1;
  }

  $reports = $carnetpdf->reports($cle, $lignes);
  $totaux = $carnetpdf->totaux($cle, $lignes, $maxligne);
  $general = $carnetpdf->totaux_generaux($cle, $lignes, $maxligne);
  $html .= $carnetpdf->debut_table($reports);
  $html .= $carnetpdf->lignes_table($cle, $lignes);
  $html .= $carnetpdf->bas_tableau($totaux, $general);

  $cle = $cle + 10;
  $page++;
}

$html .= '</body></html>';

// téléchargement du PDF
gotenberg_pdf($html, 'carnet.pdf', 'attachment', array(
  'marginTop' => '5mm',
  'marginBottom' => '5mm',
  'marginLeft' => '10mm',
  'marginRight' => '10mm',
));
