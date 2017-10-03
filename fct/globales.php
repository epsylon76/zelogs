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
