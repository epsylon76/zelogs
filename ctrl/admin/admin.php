<?php
if($_SESSION['membreid']!=16)
{
  header('location:zelogsv3.php?page=accueil');
}


include_once 'mdl/membres.php';
include_once 'mdl/carnet.php';
include_once 'mdl/aeronef.php';
$aeronef = new aeronef();
$membres = new membres();
$carnet = new carnet();

$liste_af = $aeronef->liste_af_items();
$liste_membres = $membres->liste_membres();


include_once 'fct/calculs.php';

if(isset($_GET['immat']) && isset($_GET['newimmat']))
{
  $aeronef->set_immat($_GET['immat'],$_GET['newimmat']);
  header('location:zelogsv3.php?page=admin');
}

if(isset($_GET['action']) && $_GET['action']=="addaf" && isset($_GET['immat']))
{
  $aeronef->ajout_table_aeronef($_GET['immat']);
  header('location:zelogsv3.php?page=admin');
}

if(isset($_GET['newtype']) && isset($_GET['immat']))
{
  $aeronef->set_type($_GET['immat'], $_GET['newtype']);
  header('location:zelogsv3.php?page=admin');
}



include_once 'vue/head.php';
include_once 'vue/admin/admin.php';
include_once 'vue/admin/scripts_admin.php';
