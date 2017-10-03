<?php
if($_SESSION['membreid']!=16){header('location:zelogsv3.php?page=accueil');}


include_once 'mdl/membres.php';
include_once 'mdl/carnet.php';
include_once 'mdl/aeronef.php';
$aeronef = new aeronef();
$membres = new membres();
$carnet = new carnet();

$liste_af = $aeronef->liste_af_items();
$liste_membres = $membres->liste_membres();


include_once 'fct/calculs.php';


include_once 'vue/head.php';
include_once 'vue/admin/admin.php';


include_once 'vue/foot.php';
include_once 'vue/modules/datatablesscripts.php';
