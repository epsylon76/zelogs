<?php

$membreid=$_SESSION['membreid'];

include_once 'mdl/carnet.php';
include_once 'mdl/carnetpdf.php';
include_once 'mdl/aeronef.php';
include_once 'fct/globales.php';
include_once 'fct/calculs.php';

$carnetpdf = new carnetpdf();
$carnet = new carnet();
$aeronef = new aeronef();

if(isset($_GET['date_debut']))
{
  $date_debut=$_GET['date_debut'];
}else{
  $date_debut = $carnet->premiere_date($membreid); 
}

//on met toutes les lignes du carnet en mémoire
$lignes=$carnet->lignes_carnet($_SESSION['membreid']);

//il faut contraindre date_debut à être dans les limites du carnet
if($date_debut<date_premier_saut($membreid)){$date_debut=date_premier_saut($membreid);}
if($date_debut>date_dernier_saut($membreid)){$date_debut=date_dernier_saut($membreid);}
//on definit le numero de ligne qui commence la premiere page en fontion de la date
//pr($lignes);
$cle = num_array_ligne($lignes, $date_debut);
echo $cle;
//on definit un type d'aéronef si l'immat existe dans la table aeronef
foreach($lignes as $key => $ligne)
{
  if($aeronef->af_present($ligne['immat'])==1) //y a il une correspondance ?
  {
    //on definit un typeaf
    $lignes[$key]['aftype']=$aeronef->type($ligne['immat']);
  }
}

//on met en mémoire le numero de ligne max
$maxligne = count($lignes) - 1; //count != array key

ob_end_clean();//on nettoie l'output pour mpdf

include_once 'vue/pdf/headpdf.php';
include_once 'vue/pdf/carnetpdf.php';
