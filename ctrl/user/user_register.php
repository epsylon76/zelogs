<?php

if($_POST['pass']==$_POST['pass_confirm']){
//var_dump($_POST);
$login = $_POST['login'];
$email = $_POST['email'];
$test = $_POST['test'];


include_once 'mdl/membres.php';
$membres= new membres();

$test_present_membre=$membres->donnees_membre($login);
$test_present_email=$membres->donnees_membre_email($email);

if($test_present_membre) //si true c'est qu'il y a un membre qui s'appelle déjà comme ça
{
  $message_titre="Déja pris";
  $message_corps="Cet identifiant est déjà pris, peut être avez vous déjà un compte ?";
  $message_couleur="warning";
  $message_retour="register.html";
  include_once 'vue/modules/message.php';
}
elseif ($test_present_email)
{
  $message_titre="Déja pris";
  $message_corps="Cet email est déjà enregistré, peut être avez vous déjà un compte ?";
  $message_couleur="warning";
  $message_retour="register.html";
  include_once 'vue/modules/message.php';
}
elseif(checkCaptcha($test))
{
  $membres->enregistrer_membre($_POST);
  $message_titre="Inscription effectuée";
  $message_corps="Vous vous êtes inscrit avec l'adresse email ".$_POST['email'];
  $message_couleur="success";
  $message_retour="zelogsv3.php";
  $message_url="zelogsv3.php?page=login";
  include_once 'vue/modules/message.php';
}else{
  $message_titre="Mauvaise réponse";
  $message_corps="Vous avez mal rempli la question anti robot";
  $message_couleur="warning";
  $message_retour="zelogsv3.php";
  $message_url="zelogsv3.php?page=login";
  include_once 'vue/modules/message.php';
}


}else {
  echo "les mots de passe ne correspondent pas";
}
