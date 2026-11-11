<?php

$membreid = $_SESSION['membreid'];

include_once 'mdl/carnet.php';
include_once 'mdl/carnetpdf.php';
include_once 'mdl/aeronef.php';
include_once 'fct/globales.php';
include_once 'fct/calculs.php';

$carnetpdf = new carnetpdf();
$carnet = new carnet();
$aeronef = new aeronef();

$date_debut = date_valide(isset($_GET['date_debut']) ? $_GET['date_debut'] : null);
if ($date_debut === null) {
  $date_debut = $carnet->premiere_date($membreid);
}

//on met toutes les lignes du carnet en mémoire
$lignes = $carnet->lignes_carnet($_SESSION['membreid']);

//il faut contraindre date_debut à être dans les limites du carnet
if ($date_debut < date_premier_saut($membreid)) {
  $date_debut = date_premier_saut($membreid);
}
// aucun saut à imprimer : on l'explique au lieu de sortir la page du dernier saut (11/11/2026)
$dernier_saut = date_dernier_saut($membreid);
if (count($lignes) === 0 || $date_debut > $dernier_saut) {
  $message_titre = 'Aucun saut à imprimer';
  $message_corps = (count($lignes) === 0)
    ? 'Votre carnet ne contient encore aucun saut.'
    : 'Aucun saut depuis le ' . e(date_unix_humain($date_debut)) . '. Votre dernier saut date du ' . e(date_unix_humain($dernier_saut)) . '.';
  $message_retour = 'zelogsv3.php?page=carnet';
  include_once 'vue/head.php';
  include_once 'vue/modules/menu.php';
  include_once 'vue/modules/message.php';
  return;
}
//on definit le numero de ligne qui commence la premiere page en fontion de la date
//pr($lignes);
$cle = num_array_ligne($lignes, $date_debut);
//echo $cle;


//on met en mémoire le numero de ligne max
$maxligne = (count($lignes) - 1); //count != array key

//ob_end_clean();//on nettoie l'output pour mpdf

include_once 'vue/pdf/headpdf.php';
include_once 'vue/pdf/carnetpdf.php';
