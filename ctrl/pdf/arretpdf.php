<?php

$membreid=$_SESSION['membreid'];

include_once 'mdl/carnet.php';
include_once 'mdl/arretpdf.php';
include_once 'fct/globales.php';
include_once 'fct/calculs.php';

$arretpdf = new arretpdf();
$carnet = new carnet();

if(isset($_GET['date_arret']))
{
  $date_arret=$_GET['date_arret'];
}else{
  $date_arret = $carnet->derniere_date($membreid);
}

//il faut contraindre date_arret à être dans les limites du carnet => non, au contraire, pas obligatoire
//if($date_arret>date_dernier_saut($membreid)){$date_arret=date_dernier_saut($membreid);}

//initialisation des valeurs
$total="0";
$biplaces="0";
$solos="0";
$hdv="0";
$total12="0";
$biplaces12="0";
$solos12="0";
$hdv12="0";

//depuis la premiere date jusqu'a la date d'arret demandée
$total=$arretpdf->total($membreid,$date_arret);
$total12=$arretpdf->total12($membreid,$date_arret);
$biplaces=$arretpdf->biplaces($membreid,$date_arret);
$biplaces12=$arretpdf->biplaces12($membreid,$date_arret);
$solos=$arretpdf->solos($membreid,$date_arret);
$solos12=$arretpdf->solos12($membreid,$date_arret);
$hdv=$arretpdf->hdv($membreid,$date_arret);
$hdv12=$arretpdf->hdv12($membreid,$date_arret);


ob_end_clean();//on nettoie l'output pour mpdf

include_once 'vue/pdf/headpdf.php';
include_once 'vue/pdf/arretpdf.php';
