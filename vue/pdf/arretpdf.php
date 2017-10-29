<?php

set_time_limit(500);
//on va compter deux tableau avant un changement de page
$html='<style>
table{
  width:100%;
  font-family:courier;
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
</style>';

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




$mpdf->WriteHTML($html);
$mpdf->Output('carnet.pdf', 'I'); //impress
