<?php
//
//CES FONCTIONS FONT DES OPERATIONS SUR $lignes
//

class carnetpdf
{

  function reports($cle,$lignes)
  {
    //calcule les reports à afficher avant l'itemid donné en paramètrue
    $OA=0;
    $ORBAS=0;
    $ORNORM=0;
    $ORHAUT=0;
    $TPSVOL=0;

    for($i=1; $i<$cle ;$i++)
    {
      //types de saut
      if($lignes[$i]['CA']==0)
      {
        $OA=$OA+$lignes[$i]['nb'];
      }else {
        if($lignes[$i]['hauteur']<1600){$ORBAS=$ORBAS+$lignes[$i]['nb'];}
        if($lignes[$i]['hauteur']>4500){$ORHAUT=$ORHAUT+$lignes[$i]['nb'];}
        if($lignes[$i]['hauteur']<=4500 && $lignes[$i]['hauteur']>=1600){$ORNORM=$ORNORM+$lignes[$i]['nb'];}
      }
      //temps de vol
      $TPSVOL=$TPSVOL+($lignes[$i]['nb']*$lignes[$i]['tpsvol']);
    }
    $reports['OA']=$OA;
    $reports['ORBAS']=$ORBAS;
    $reports['ORNORM']=$ORNORM;
    $reports['ORHAUT']=$ORHAUT;
    $reports['TPSVOL']=$TPSVOL;

    return $reports;
  }



  function debut_table($reports)
  {
    $html='

    <table>
    <tr>
    <td class="t1"  rowspan="2">Date</th>
    <td class="t1"   rowspan="2">Fonction à bord</th>
    <td class="t1"  rowspan="2">Lieu</th>
    <td class="t2" colspan="2" >Aéronef</th>
    <td class="t7" colspan="7">Sauts</th>
    <td class="t1"  rowspan="2">Temps de vol</th>
    <td rowspan="2" class="ts">Sceau, Signature de l\'autorité habilitée</th>
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
    <td class="haut2">'.$reports['OA'].'</td>
    <td class="haut2">'.$reports['ORBAS'].'</td>
    <td class="haut2">'.$reports['ORNORM'].'</td>
    <td class="haut2">'.$reports['ORHAUT'].'</td>
    <td class="haut2">'.$reports['TPSVOL'].'</td>
    <td class="haut2"></td>
    </tr>';
    return $html;
  }

  function lignes_table($cle,$lignes)
  {
    $html='';
    $max=count($lignes);
    for($i=0; $i<10 && ($cle+$i)<$max; $i++)//executer 10 fois, sauf si la ligne en cours vaut le numero max de ligne
    {
      $OA=0;
      $ORBAS=0;
      $ORNORM=0;
      $ORHAUT=0;

      if($lignes[$cle+$i]['CA']==0)
      {
        $OA=$OA+$lignes[$cle+$i]['nb'];
      }else {
        if($lignes[$cle+$i]['hauteur']<1600){$ORBAS=$ORBAS+$lignes[$cle+$i]['nb'];}
        if($lignes[$cle+$i]['hauteur']>4500){$ORHAUT=$ORHAUT+$lignes[$cle+$i]['nb'];}
        if($lignes[$cle+$i]['hauteur']<=4500 && $lignes[$cle+$i]['hauteur']>=1600){$ORNORM=$ORNORM+$lignes[$cle+$i]['nb'];}
      }

      $html=$html.'
      <tr>
      <td class="t1 haut2" >'.date_unix_humain($lignes[$cle+$i]['date']).'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['fct'].'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['lieu'].'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['immat'].'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['immat'].'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['principale'].'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['hauteur'].'</td>
      <td class="t1 haut2" >'.trad_trav_ent($lignes[$cle+$i]['TE']).'</td>
      <td class="t1 haut2" >'.$OA.'</td>
      <td class="t1 haut2" >'.$ORBAS.'</td>
      <td class="t1 haut2" >'.$ORNORM.'</td>
      <td class="t1 haut2" >'.$ORHAUT.'</td>
      <td class="t1 haut2" >'.$lignes[$cle+$i]['tpsvol']*$lignes[$cle+$i]['nb'].'</td>
      <td>'.$lignes[$cle+$i]['com'].'</td>
      </tr>';
    }
    return $html;
  }

  //retourne les totaux de bas de page : total genéral HDV, total Oa ORBAS ORNORM ORHAUT, TPS VOL
  function totaux($cle,$lignes,$maxligne)
  {
    //calcule les totaux à afficher
    $OA=0;
    $ORBAS=0;
    $ORNORM=0;
    $ORHAUT=0;
    $TPSVOL=0;

    for($i=$cle; $i<=($cle+10); $i++)
    {
      if($i<=$maxligne)
      {
        //types de saut
        if($lignes[$i]['CA']==0)
        {
          $OA=$OA+$lignes[$i]['nb'];
        }else {
          if($lignes[$i]['hauteur']<1600){$ORBAS=$ORBAS+$lignes[$i]['nb'];}
          if($lignes[$i]['hauteur']>4500){$ORHAUT=$ORHAUT+$lignes[$i]['nb'];}
          if($lignes[$i]['hauteur']<=4500 && $lignes[$i]['hauteur']>=1600){$ORNORM=$ORNORM+$lignes[$i]['nb'];}
        }
        //temps de vol
        $TPSVOL=$TPSVOL+($lignes[$i]['nb']*$lignes[$i]['tpsvol']);
      }
    }

    $total['OA']=$OA;
    $total['ORBAS']=$ORBAS;
    $total['ORNORM']=$ORNORM;
    $total['ORHAUT']=$ORHAUT;
    $total['TPSVOL']=$TPSVOL;

    return $total;
  }

  function totaux_generaux($cle,$lignes,$maxligne)
  {
    //calcule les totaux à afficher
    $hdv=0;
    $sauts=0;

    for($i=1; $i<=($cle+10); $i++)
    {
      if($i<=$maxligne)
      {
        //temps de vol
        $hdv=$hdv+($lignes[$i]['nb']*$lignes[$i]['tpsvol']);
        //Sauts
        $sauts=$sauts+$lignes[$i]['nb'];
      }
    }

    $general['hdv']=$hdv;
    $general['sauts']=$sauts;

    return $general;
  }

  function bas_tableau($totaux,$general)
  {
    $html='
    <tr >
    <td class="haut2" colspan="8" style="border:none;">Total général des Heures de vol</td>
    <td  class="haut2" rowspan=2>'.$totaux['OA'].'</td>
    <td  class="haut2" rowspan=2>'.$totaux['ORBAS'].'</td>
    <td  class="haut2" rowspan=2>'.$totaux['ORNORM'].'</td>
    <td class="haut2" rowspan=2>'.$totaux['ORHAUT'].'</td>
    <td class="haut2" rowspan=2>'.$totaux['TPSVOL'].'</td>
    <td class="haut2" style="border:0px;">TOTAL GENERAL DES SAUTS</td>
    </tr>
    <tr class="haut2">
    <td colspan="8" style="border:none;"> '.minutes_trad($general['hdv']).'</td>

    <td style="border:0px;">'.$general['sauts'].' SAUTS</td>
    </tr>
    </table>
    <br>
    <br>
    <hr>
    <br>
    ';
    return $html;
  }



}
