<?php
// Suppression d'un saut : page de confirmation puis POST avec jeton CSRF (11/11/2026)

//le modèle carnet
include_once 'mdl/carnet.php';
$carnet = new carnet();

$membreid = (int) $_SESSION['membreid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $element = isset($_POST['element']) ? (int) $_POST['element'] : 0;
  if (csrf_valide() && $carnet->item_ownedby_membre($element, $membreid)) {
    $carnet->suppr_saut($element);
  }
  header('Location: zelogsv3.php?page=carnet');
  exit();
}

$element = isset($_GET['element']) ? (int) $_GET['element'] : 0;
if (!$carnet->item_ownedby_membre($element, $membreid)) {
  header('Location: zelogsv3.php?page=carnet');
  exit();
}
$saut = $carnet->ligne_carnet($element);

include_once 'vue/modules/menu.php';
include_once 'vue/carnet/suppr_saut.php';
