<?php

$membreid=$_SESSION['membreid'];

include_once 'mdl/carnet.php';
include_once 'mdl/carnetpdf.php';
include_once 'fct/globales.php';
include_once 'fct/calculs.php';

$carnetpdf = new carnetpdf();
$carnet = new carnet();

if(isset($_GET['date_arret']))
{
  $date_arret=$_GET['date_arret'];
}else{
  $date_arret = $carnet->derniere_date($membreid);
}

//il faut contraindre date_arret à être dans les limites du carnet
if($date_arret>date_dernier_saut($membreid)){$date_arret=date_dernier_saut($membreid);}

//initialisation des valeurs
$total=0;
$biplace=0;
$solo=0;
$hdv=0;
$total12=0;
$biplace12=0;
$solo12=0;
$hdv12=0;

//depuis la premiere date jusqu'a la date d'arret demandée
$total=$carnet->compte_sauts($membreid,)
