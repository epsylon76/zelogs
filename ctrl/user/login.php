<?php
include_once 'mdl/membres.php';
$membres= new membres();

//si on a des variables POST en entrée, on teste le couple login pass
if (isset($_POST['login']) && isset($_POST['pass']))
{
  //si un des deux champs est vide on renvoie une erreur
  if(empty($_POST['login']) || empty($_POST['pass']))
  {
    header('Location: zelogsv3.php?page=login&erreur=champ');
    exit();
  }

  $test_login = $membres->login($_POST['login'],$_POST['pass']);

  // si on obtient une réponse, alors l'utilisateur est un membre
  if ($test_login)
  {
    $donnees_membre = $membres->donnees_membre($_POST['login']);

    $_SESSION['login'] = $donnees_membre['login'];
    $_SESSION['pass_md5'] = $donnees_membre['pass_md5'];
    $_SESSION['membreid'] = $donnees_membre['id'];
    $_SESSION['timestamp'] = time();

    header('Location: zelogsv3.php',1);
    exit();
  }
  // si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
  elseif ($data[0] == 0)
  {
    header('Location: zelogsv3.php?page=login&erreur=compt');
    exit();
  }
  // sinon, alors la, il y a un gros problème :)
  else {
    header('Location: zelogsv3.php?page=login&erreur=1',1);
    exit();
  }





}
else {  //si on a pas de variables POSt en entrée, alors on affiche simplement la page
  include_once('vue/login.php');
}
