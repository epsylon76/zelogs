<?php
if(isset($_POST)){
//var_dump($_POST);
$login = $_POST['login'];
include_once 'mdl/membres.php';
$membres= new membres();
$test_present_membre=$membres->donnees_membre($login);
if($test_present_membre) //si true c'est qu'il y a un membre qui s'appelle déjà comme ça
{
  $message_titre="Déja pris";
  $message_corps="Cet identifiant est déjà pris, peut être avez vous déjà un compte ?";
  $message_couleur="warning";
  $message_retour="register.html";
  include_once 'vue/message.php';
}
else
{
  $message_titre="Inscription effectuée";
  $message_corps="Vous vous êtes inscrit avec l'adresse email ".$_POST['email'];
  $message_couleur="success";
  $message_retour="zelogsv3.php";
  $message_url="zelogsv3.php?page=login";
  include_once 'vue/message.php';
}


}else {
  echo "pas de post";
}
