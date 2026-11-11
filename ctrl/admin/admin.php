<?php
if((int) $_SESSION['membreid'] !== 16)
{
  header('location:zelogsv3.php?page=accueil');
  exit(); // sans exit, tout membre exécutait la page admin (corrigé le 11/11/2026)
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

// actions admin : uniquement en POST avec jeton CSRF (11/11/2026)
if($_SERVER['REQUEST_METHOD'] === 'POST' && csrf_valide() && isset($_POST['immat']) && is_string($_POST['immat']))
{
  if(isset($_POST['newimmat']) && is_string($_POST['newimmat']) && $_POST['newimmat'] !== '')
  {
    $aeronef->set_immat($_POST['immat'], $_POST['newimmat']);
  }
  elseif(isset($_POST['action']) && $_POST['action']=="addaf")
  {
    $aeronef->ajout_table_aeronef($_POST['immat']);
  }
  elseif(isset($_POST['newtype']) && is_string($_POST['newtype']) && $_POST['newtype'] !== '')
  {
    $aeronef->set_type($_POST['immat'], $_POST['newtype']);
  }
  header('location:zelogsv3.php?page=admin');
  exit();
}

include_once 'vue/admin/admin.php';
include_once 'vue/admin/scripts_admin.php';
