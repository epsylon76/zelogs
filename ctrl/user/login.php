<?php
include_once 'mdl/membres.php';
$membres= new membres();

//si on a des variables POST en entrée, on teste le couple login pass
if (isset($_POST['login']) && isset($_POST['pass']))
{
  //si un des deux champs est vide on renvoie une erreur
  if(!is_string($_POST['login']) || !is_string($_POST['pass']) || $_POST['login'] === '' || $_POST['pass'] === '')
  {
    header('Location: zelogsv3.php?page=login&erreur=champ');
    exit();
  }

  $test_login = $membres->login($_POST['login'],$_POST['pass']);
  // si on obtient une réponse, alors l'utilisateur est un membre
  if ($test_login)
  {
    $donnees_membre = $membres->donnees_membre($test_login['id']);

    // nouvel identifiant de session à la connexion (fixation de session)
    session_regenerate_id(true);
    $_SESSION = array();
    $_SESSION['login'] = $donnees_membre['login'];
    $_SESSION['membreid'] = (int) $donnees_membre['id'];
    $_SESSION['timestamp'] = time();

    header('Location: zelogsv3.php');
    exit();
  }
  else // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
  {
    header('Location: zelogsv3.php?page=login&erreur=compt');
    exit();
  }



}
else {  //si on a pas de variables POSt en entrée, alors on affiche simplement la page
  include_once('vue/login.php');
}
