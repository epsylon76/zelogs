<?php
//
//CES FONCTIONS FONT DES OPERATIONS SUR $lignes
//

class carnetpdf
{

  function reports($cle, $lignes)
  {
    //calcule les reports à afficher avant l'itemid donné en paramètrue
    $OA = 0;
    $ORBAS = 0;
    $ORNORM = 0;
    $ORHAUT = 0;
    $TPSVOL = 0;

    if ($cle != 0) {  //si premiere page du carnet
      for ($i = 0; $i < $cle; $i++) {
        //types de saut
        if ($lignes[$i]['CA'] == 0) {
          $OA += $lignes[$i]['nb'];
        } else {
          if ($lignes[$i]['hauteur'] < 1600) {
            $ORBAS += $lignes[$i]['nb'];
          }
          if ($lignes[$i]['hauteur'] > 4500) {
            $ORHAUT += $lignes[$i]['nb'];
          }
          if ($lignes[$i]['hauteur'] <= 4500 && $lignes[$i]['hauteur'] >= 1600) {
            $ORNORM += $lignes[$i]['nb'];
          }
        }
        //temps de vol
        $TPSVOL += ($lignes[$i]['nb'] * $lignes[$i]['tpsvol']);
      }
    }

    $reports['OA'] = $OA;
    $reports['ORBAS'] = $ORBAS;
    $reports['ORNORM'] = $ORNORM;
    $reports['ORHAUT'] = $ORHAUT;
    $reports['TPSVOL'] = $TPSVOL;

    return $reports;
  }



  function debut_table($reports)
  {
    $html = '
    <br>
    <br>
    <table>
    <tr>
    <td class="t1 haut1"  rowspan="2">Date</th>
    <td class="t1 haut1"   rowspan="2">Fonction</th>
    <td class="t1 haut1"  rowspan="2">Lieu</th>
    <td class="t2 haut1" colspan="2" >Aéronef</th>
    <td class="t7 haut1" colspan="7">Sauts</th>
    <td class="t1 haut1"  rowspan="2">Temps<br> de vol</th>
    <td rowspan="2" class="ts haut1">Signature de l\'autorité<br> habilitée</th>
    </tr>

    <tr>
    <td>Immat</td>
    <td>Type</td>
    <td>Parachute</td>
    <td>Hauteur</td>
    <td>Nature</td>
    <td>OA</td>
    <td>OR&lt;=30"</td>
    <td>OR&lt;=60"</td>
    <td>OR&gt;60"</td>
    </tr>

    <tr>
    <td class="haut2" colspan="8" style="text-align:right;">REPORTS ...</td>
    <td class="haut2">' . $reports['OA'] . '</td>
    <td class="haut2">' . $reports['ORBAS'] . '</td>
    <td class="haut2">' . $reports['ORNORM'] . '</td>
    <td class="haut2">' . $reports['ORHAUT'] . '</td>
    <td class="haut2">' . minutes_mini_trad($reports['TPSVOL']) . '</td>
    <td class="haut2"></td>
    </tr>';
    return $html;
  }

  function lignes_table($cle, $lignes)
  {
    $html = '';
    $max = count($lignes);
    for ($i = 0; $i < 10; $i++) //executer 10 fois, sauf si la ligne en cours vaut le numero max de ligne
    {
      if (($cle + $i) < $max) {
        $OA = 0;
        $ORBAS = 0;
        $ORNORM = 0;
        $ORHAUT = 0;

        if ($lignes[$cle + $i]['CA'] == 0) {
          $OA += $lignes[$cle + $i]['nb'];
        } else {
          if ($lignes[$cle + $i]['hauteur'] < 1600) {
            $ORBAS += $lignes[$cle + $i]['nb'];
          }
          if ($lignes[$cle + $i]['hauteur'] > 4500) {
            $ORHAUT += $lignes[$cle + $i]['nb'];
          }
          if ($lignes[$cle + $i]['hauteur'] <= 4500 && $lignes[$cle + $i]['hauteur'] >= 1600) {
            $ORNORM += $lignes[$cle + $i]['nb'];
          }
        }


        $html = $html . '
      <tr>
      <td class="t1 haut2" >' . date_unix_humain($lignes[$cle + $i]['date']) . '</td>
      <td class="t1 haut2" >' . trad_fct($lignes[$cle + $i]['fct']) . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['lieu'] . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['immat'] . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['aftype'] . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['principale'] . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['hauteur'] . '</td>
      <td class="t1 haut2" >' . trad_trav_ent($lignes[$cle + $i]['TE']) . '</td>
      <td class="t1 haut2" >' . $OA . '</td>
      <td class="t1 haut2" >' . $ORBAS . '</td>
      <td class="t1 haut2" >' . $ORNORM . '</td>
      <td class="t1 haut2" >' . $ORHAUT . '</td>
      <td class="t1 haut2" >' . $lignes[$cle + $i]['tpsvol'] * $lignes[$cle + $i]['nb'] . '</td>
      <td>' . $lignes[$cle + $i]['com'] . '</td>
      </tr>';
      } else {
        //afficher des lignes vides pour compléter la page
        $html = $html . '
      <tr>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td class="t1 haut2" ></td>
      <td></td>
      </tr>';
      }
    }

    return $html;
  }

  //retourne les totaux de bas de page : total genéral HDV, total Oa ORBAS ORNORM ORHAUT, TPS VOL
  function totaux($cle, $lignes, $maxligne)
  {
    //calcule les totaux à afficher
    $OA = 0;
    $ORBAS = 0;
    $ORNORM = 0;
    $ORHAUT = 0;
    $TPSVOL = 0;

    for ($i = $cle; $i <= ($cle + 9); $i++) {
      if ($i <= $maxligne) {
        //types de saut
        if ($lignes[$i]['CA'] == 0) {
          $OA = $OA + $lignes[$i]['nb'];
        } else {
          if ($lignes[$i]['hauteur'] < 1600) {
            $ORBAS = $ORBAS + $lignes[$i]['nb'];
          }
          if ($lignes[$i]['hauteur'] > 4500) {
            $ORHAUT = $ORHAUT + $lignes[$i]['nb'];
          }
          if ($lignes[$i]['hauteur'] <= 4500 && $lignes[$i]['hauteur'] >= 1600) {
            $ORNORM = $ORNORM + $lignes[$i]['nb'];
          }
        }
        //temps de vol
        $TPSVOL = $TPSVOL + ($lignes[$i]['nb'] * $lignes[$i]['tpsvol']);
      }
    }

    $total['OA'] = $OA;
    $total['ORBAS'] = $ORBAS;
    $total['ORNORM'] = $ORNORM;
    $total['ORHAUT'] = $ORHAUT;
    $total['TPSVOL'] = $TPSVOL;

    return $total;
  }

  function totaux_generaux($cle, $lignes, $maxligne)
  {
    //calcule les totaux à afficher
    $hdv = 0;
    $sauts = 0;

    for ($i = 0; $i <= ($cle + 9); $i++) {
      if ($i <= $maxligne) {
        //temps de vol
        $hdv = $hdv + ($lignes[$i]['nb'] * $lignes[$i]['tpsvol']);
        //Sauts
        $sauts = $sauts + $lignes[$i]['nb'];
      }
    }

    $general['hdv'] = $hdv;
    $general['sauts'] = $sauts;

    return $general;
  }

  function bas_tableau($totaux, $general)
  {
    $html = '
    <tr >
    <td class="haut2" colspan="4" style="border:none;">Total général des Heures de vol</td>
    <td class="haut2" colspan="4" style="border:none;"></td>
    <td  class="haut2" rowspan=2>' . $totaux['OA'] . '</td>
    <td  class="haut2" rowspan=2>' . $totaux['ORBAS'] . '</td>
    <td  class="haut2" rowspan=2>' . $totaux['ORNORM'] . '</td>
    <td class="haut2" rowspan=2>' . $totaux['ORHAUT'] . '</td>
    <td class="haut2" rowspan=2>' . minutes_mini_trad($totaux['TPSVOL']) . '</td>
    <td class="haut2" style="border:0px;">TOTAL GENERAL DES SAUTS</td>
    </tr>
    <tr class="haut2">
    <td colspan="4" style="border:none;"> ' . minutes_trad($general['hdv']) . '</td>
    <td colspan="4" style="border:none;">TOTAUX à REPORTER ...</td>

    <td style="border:0px;">' . $general['sauts'] . ' SAUTS</td>
    </tr>
    </table>
    <br>
    <br>
    <hr>
    ';
    return $html;
  }
}
