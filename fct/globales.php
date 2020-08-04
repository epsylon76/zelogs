<?php

function date_humain_unix($date_humain){
  //separation de la date par / ou -
  list ($jour , $mois , $an) = preg_split("[/]",$date_humain);
  //inverse la date

  return($an."-".$mois."-".$jour);
}

function date_unix_humain($date_unix){
  //separation de la date par / ou -
  list ($an , $mois , $jour) = preg_split("[-]",$date_unix);
  //inverse la date

  return($jour."/".$mois."/".$an);
}

function checkCaptcha($test) {
    $current_month = intval(date('n'));

    switch ($current_month) {
       case 1:
           $reponse_attendue =  "janvier";
           break;
       case 2:
           $reponse_attendue =  "fevrier";
           break;
       case 3:
           $reponse_attendue =  "mars";
           break;
       case 4:
           $reponse_attendue =  "avril";
           break;
       case 5:
           $reponse_attendue =  "mai";
           break;
       case 6:
           $reponse_attendue =  "juin";
           break;
       case 7:
           $reponse_attendue =  "juillet";
           break;
       case 8:
           $reponse_attendue =  "aout";
           break;
       case 9:
           $reponse_attendue =  "septembre";
           break;
       case 10:
           $reponse_attendue =  "octobre";
           break;
       case 11:
           $reponse_attendue =  "novembre";
           break;
       case 12:
           $reponse_attendue =  "decembre";
           break;
   }
    // Compare numbers
    if ($reponse_attendue == $test){
        return true;
      }else{
        return false;
      }
}

//traduction de travail entrainement
function trad_trav_ent($te) {

  switch($te)
  {
    case 0:
    $te="E";
    break;
    case 1:
    $te="T";
    break;
  }
  return $te;
}


//traduction de biplace solo

function trad_bi_solo($bs) {

  switch($bs)
  {
    case 0:
    $bs="Solo";
    break;
    case 1:
    $bs="Bi";
    break;
  }
  return $bs;
}


//traduction de la fonction à bord fpdf

function trad_fct($fct) {
  switch ($fct)
  {
    case 1:
    $fct="P";
    break;
    case 2:
    $fct="E";
    break;
    case 3:
    $fct="L";
    break;
    case 4:
    $fct="I";
    break;
  }
  return $fct;
}

function trad_spe($spe) {
  switch ($spe)
  {
    case 1:
    $spe="M";
    break;
    case 2:
    $spe="N";
    break;
    case 3:
    $spe="L";
    break;
    case 4:
    $spe="W";
    break;
  }
  return $spe;
}

//iconification spéciaux

function icon_spe($spe)
{
  $icons="";
  if(stripos($spe, '1') !== FALSE){$icons='<i class="glyphicon glyphicon-flag" title="manifestation"></i>';}
  if(stripos($spe, '2') !== FALSE){$icons=$icons.' <i class="fa fa-moon-o" title="nuit"></i>';}
  if(stripos($spe, '3') !== FALSE){$icons=$icons.' <i class="fa fa-caret-square-o-down" title="largage"></i>';}
  if(stripos($spe, '4') !== FALSE){$icons=$icons.' <img src="img/wings.png" style="height:16px; width:16px" title="wingsuit"></i>';}

  return $icons;
}

function minutes_trad($minutes)
{
  $h = floor($minutes/60);
  $m=($minutes % 60);

  return $h.' Heures '.$m.' minutes';
}

function minutes_mini_trad($minutes)
{
  $h = floor($minutes/60);
  $m=($minutes % 60);
  return $h.'h '.$m.'min';
}
