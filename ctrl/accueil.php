<?php
//dans l'accueil on a le graph du récap des sauts par année, on va juste déterminer l'année en cours et l'année n-1
$annee_en_cours=date("Y");
$annee_avant=$annee_en_cours-1;


include_once 'fct/calculs.php';
include_once 'mdl/carnet.php';

$carnet = new carnet();
//si l'utilisateur a Zéro sauts on l'envoie ver la page tuto
$total=$carnet->compte_sauts($_SESSION['membreid'],0,0,0);

if($total==0){header("location:zelogsv3.php?page=tuto");}

//panels recap du haut
//TOTAL

$totaln=$carnet->compte_sauts($_SESSION['membreid'],$annee_en_cours,0,0);
$total_avant=$carnet->compte_sauts($_SESSION['membreid'],$annee_avant,0,0);
//TRAVAIL/ENTRAINEMENT
$travail=$carnet->compte_sauts($_SESSION['membreid'],0,"TE",1);
$travailn=$carnet->compte_sauts($_SESSION['membreid'],$annee_en_cours,"TE",1);
$travail_avant=$carnet->compte_sauts($_SESSION['membreid'],$annee_avant,"TE",1);

$entrainement=$carnet->compte_sauts($_SESSION['membreid'],0,"TE",0);
$entrainementn=$carnet->compte_sauts($_SESSION['membreid'],$annee_en_cours,"TE",0);
$entrainement_avant=$carnet->compte_sauts($_SESSION['membreid'],$annee_avant,"TE",0);
//Biplace /Solo
$biplace=$carnet->compte_sauts($_SESSION['membreid'],0,"BS",1);
$biplacen=$carnet->compte_sauts($_SESSION['membreid'],$annee_en_cours,"BS",1);
$biplace_avant=$carnet->compte_sauts($_SESSION['membreid'],$annee_avant,"BS",1);

$solo=$carnet->compte_sauts($_SESSION['membreid'],0,"BS",0);
$solon=$carnet->compte_sauts($_SESSION['membreid'],$annee_en_cours,"BS",0);
$solo_avant=$carnet->compte_sauts($_SESSION['membreid'],$annee_avant,"BS",0);

//on recupere le nombre de sauts par année dans recapsaut et recapsaut2
$recapsaut=nbsautsmois($annee_en_cours);
$recapsaut2=nbsautsmois($annee_avant);




include_once 'vue/modules/menu.php';
include_once 'vue/accueil.php';
include_once 'data/graph_annees.php';
