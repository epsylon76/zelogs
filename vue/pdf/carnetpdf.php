<?php

set_time_limit(500);
//on va compter deux tableau avant un changement de page
$page=1;
$html='<style>
table{
  width:100%;
  font-family:courier;
  font-size:9px;
  font-weight:bold;
  text-align:center;
  border-collapse:collapse;
}
td{
    border:0.5px solid black;
    white-space: nowrap
}
.t1{width:15mm;}
.ts{width:25mm;}
.haut2{height:10mm;line-height:10mm;}
hr{margin-top:0mm;margin-bottom:0mm;}
</style>';
//pour chaque page on genere tant qu'il reste des lignes à afficher
//c'est à dire que $cle<=$maxligne

//echo $cle.'  ';
//echo $maxligne;

while($cle<=$maxligne)
{
  if($page==3)
  {
    $mpdf->AddPage();
    $page=1;
  }
  //debut tableau
  $reports = $carnetpdf->reports($cle,$lignes);
  $totaux = $carnetpdf->totaux($cle,$lignes,$maxligne);
  $general = $carnetpdf->totaux_generaux($cle,$lignes,$maxligne);
  $html = $html.$carnetpdf->debut_table($reports);
  $html = $html.$carnetpdf->lignes_table($cle,$lignes);
  $html = $html.$carnetpdf->bas_tableau($totaux,$general);

  //echo $html;
  $mpdf->WriteHTML($html);
  $html='';
  $cle=$cle+10;
  //echo $page;
  $page++;

}



// output the HTML content
//$mpdf->Output('filename.pdf','D'); //download
$mpdf->Output('carnet.pdf', 'I'); //impress
