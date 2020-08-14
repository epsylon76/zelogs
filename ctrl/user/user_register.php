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
  //Cet identifiant est déjà pris, peut être avez vous déjà un compte ?";
  header('location:new_account.php?erreur=deja');
}
elseif ($test_present_email)
{
  //"Cet email est déjà enregistré, peut être avez vous déjà un compte ?";
  header('location:new_account.php?erreur=email');
}
elseif(checkCaptcha($test))
{
  $membres->enregistrer_membre($_POST);
  //"Vous vous êtes inscrit avec l'adresse email ".$_POST['email'];
  header('location:zelogsv3.php?message=registerok');
}else{
  //"Vous avez mal rempli la question anti robot";
  header('location:new_account.php?erreur=robot');
}


}else {
 
  //"Les mots de passe ne correspondent pas";
  $message_retour="zelogsv3.php";
  header('location:new_account.php?erreur=correspondance');
}
