<?php

if(!isset($_POST['login'], $_POST['pass'], $_POST['pass_confirm'], $_POST['email'], $_POST['test'])
  || !is_string($_POST['login']) || !is_string($_POST['pass']) || !is_string($_POST['email']) || !is_string($_POST['test'])
  || trim($_POST['login']) === '' || strlen($_POST['login']) > 50 || strlen($_POST['pass']) < 6
  || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || strlen($_POST['email']) > 50){
  header('location:new_account.php?erreur=invalide');
  exit();
}

// anti-robot : formulaire réellement affiché (session), au moins 3 s pour le remplir, champ piège vide
$t_affichage = isset($_SESSION['inscription_t']) ? (int) $_SESSION['inscription_t'] : 0;
unset($_SESSION['inscription_t']);
if($t_affichage === 0 || (time() - $t_affichage) < 3 || (isset($_POST['site_web']) && $_POST['site_web'] !== '')){
  header('location:new_account.php?erreur=robot');
  exit();
}

if($_POST['pass']==$_POST['pass_confirm']){
//var_dump($_POST);
$login = trim($_POST['login']);
$_POST['login'] = $login;
$email = $_POST['email'];
$test = strtolower(trim($_POST['test']));


include_once 'mdl/membres.php';
$membres= new membres();

$test_present_membre=$membres->donnees_membre_login($login);
$test_present_email=$membres->donnees_membre_email($email);

if($test_present_membre) //si true c'est qu'il y a un membre qui s'appelle déjà comme ça
{
  //Cet identifiant est déjà pris, peut être avez vous déjà un compte ?";
  header('location:new_account.php?erreur=deja');
  exit();
}
elseif ($test_present_email)
{
  //"Cet email est déjà enregistré, peut être avez vous déjà un compte ?";
  header('location:new_account.php?erreur=email');
  exit();
}
elseif(checkCaptcha($test))
{
  $membres->enregistrer_membre($_POST);
  //"Vous vous êtes inscrit avec l'adresse email ".$_POST['email'];
  header('location:zelogsv3.php?message=registerok');
  exit();
}else{
  //"Vous avez mal rempli la question anti robot";
  header('location:new_account.php?erreur=robot');
  exit();
}


}else {
 
  //"Les mots de passe ne correspondent pas";
  $message_retour="zelogsv3.php";
  header('location:new_account.php?erreur=correspondance');
  exit();
}
