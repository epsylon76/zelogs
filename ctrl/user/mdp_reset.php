<?php
// Mot de passe oublié : choix du nouveau mot de passe depuis le lien reçu (11/11/2026).
include_once 'mdl/mdp_reset.php';
include_once 'mdl/membres.php';
$reset = new mdp_reset();

$jeton = isset($_GET['t']) && is_string($_GET['t']) ? $_GET['t'] : '';
$membre_reset = $reset->jeton_valide($jeton);
$erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';

if ($membre_reset && $_SERVER['REQUEST_METHOD'] === 'POST') {
  $suite = 'Location: zelogsv3.php?page=mdp_reset&t=' . $jeton . '&erreur=';
  if (!csrf_valide() || !isset($_POST['pass'], $_POST['pass_confirm']) || !is_string($_POST['pass']) || !is_string($_POST['pass_confirm'])) {
    header($suite . 'formulaire');
    exit();
  }
  if (strlen($_POST['pass']) < 6) {
    header($suite . 'court');
    exit();
  }
  if ($_POST['pass'] !== $_POST['pass_confirm']) {
    header($suite . 'correspondance');
    exit();
  }
  $reset->changer_mdp((int) $membre_reset['id'], $_POST['pass']);
  // le compte n'est plus bloqué par d'anciens essais de connexion
  $membres = new membres();
  $membres->effacer_echecs(mb_strtolower($membre_reset['mail']));
  $membres->effacer_echecs(mb_strtolower($membre_reset['login']));
  header('Location: zelogsv3.php?page=login&message=mdpok');
  exit();
}

include_once 'vue/mdp_reset.php';
