<?php
// Mot de passe oublié : demande du lien par e-mail (11/11/2026).
// La réponse est la même que l'adresse soit connue ou non (pas de fuite des inscrits).
include_once 'mdl/mdp_reset.php';
$reset = new mdp_reset();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!csrf_valide() || !isset($_POST['email']) || !is_string($_POST['email'])) {
    header('Location: zelogsv3.php?page=mdp_oublie&erreur=formulaire');
    exit();
  }
  $email = trim($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: zelogsv3.php?page=mdp_oublie&erreur=email');
    exit();
  }

  $ip = ip_client();
  if (!$reset->trop_de_demandes_ip($ip)) {
    $membres_trouves = $reset->membres_par_email($email);
    if (!$membres_trouves) {
      $reset->noter_demande($ip);
    }
    foreach ($membres_trouves as $m) {
      if ($reset->trop_de_demandes_membre($m['id'])) {
        continue;
      }
      include_once 'fct/mail.php';
      $jeton = $reset->noter_demande($ip, (int) $m['id']);
      $lien = url_site() . '/zelogsv3.php?page=mdp_reset&t=' . $jeton;
      $texte = "Bonjour " . $m['login'] . ",\n\n"
        . "Une demande de nouveau mot de passe a été faite pour votre compte Zelogs.\n"
        . "Pour choisir un nouveau mot de passe, ouvrez ce lien (valable 1 heure, une seule fois) :\n\n"
        . $lien . "\n\n"
        . "Si vous n'êtes pas à l'origine de cette demande, ignorez ce message : votre mot de passe reste inchangé.\n\n"
        . "Zelogs - carnet de sauts\n";
      $html = '<p>Bonjour ' . e($m['login']) . ',</p>'
        . '<p>Une demande de nouveau mot de passe a été faite pour votre compte Zelogs.</p>'
        . '<p><a href="' . e($lien) . '" style="display:inline-block;padding:10px 18px;background:#336699;color:#fff;text-decoration:none;border-radius:4px">Choisir un nouveau mot de passe</a></p>'
        . '<p style="color:#666;font-size:90%">Ce lien est valable 1 heure et ne sert qu\'une fois.<br>'
        . 'Si vous n\'êtes pas à l\'origine de cette demande, ignorez ce message : votre mot de passe reste inchangé.</p>'
        . '<p>Zelogs - carnet de sauts</p>';
      envoyer_mail($m['mail'], 'Zelogs : nouveau mot de passe', $texte, $html);
    }
  }
  header('Location: zelogsv3.php?page=mdp_oublie&message=envoye');
  exit();
}

include_once 'vue/mdp_oublie.php';
