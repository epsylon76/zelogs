<?php

set_time_limit(500);
//on va compter deux tableau avant un changement de page
$html='<!DOCTYPE html>
<html lang="fr"><head><meta charset="utf-8"><title>Arrêt de carnet</title>
<style>
@page{size:A4 portrait;margin:16mm 15mm 16mm 15mm;}
body{margin:0;}
h2{margin:0.3em 0;}
h4{margin:0 0 0.3em 0;}
table{
  width:100%;
  font-family:"Courier New",Courier,"Liberation Mono",monospace;
  font-size:14px;
  font-weight:bold;
  border-collapse:collapse;
  border: 2px solid black;
}
td{
    padding:5mm;
    border:0.5px solid black;
    vertical-align:top;
}
</style></head><body>';

$html=$html.
'
<br>
<br>
<br>
<br>
    <table>
    <tr>
      <td colspan=3>
        <h2>Arrêt de carnet en date du '.date_unix_humain($date_arret).'</h2>
      </td>
    </tr>

    <tr style="height:50mm">

      <td style="width:33%">
        <h4>Global</h4>
        <hr>
        Solo '.$solos.'<br>
        Biplace '.$biplaces.'<br>
        '.minutes_trad($hdv).'<br>
        Total '.$total.'<br>
      </td>

      <td style="width:33%">
        <h4>12 Derniers Mois</h4>
        <hr>
        Solo '.$solos12.'<br>
        Biplace '.$biplaces12.'<br>
        '.minutes_trad($hdv12).'<br>
        Total '.$total12.'<br>
      </td>

      <td style="width:33%">
        <h4>Tampon / Signature</h4>
        <hr>
      </td>

    </tr>
  </table>
  <br>
  <br>
  <hr>
';

//echo $html;




$html .= '</body></html>';

// affichage du PDF dans le navigateur
gotenberg_pdf($html, 'carnet.pdf', 'inline', array(
  'marginTop' => '16mm',
  'marginBottom' => '16mm',
  'marginLeft' => '15mm',
  'marginRight' => '15mm',
));
