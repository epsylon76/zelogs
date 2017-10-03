<?php

include_once 'vue/modules/menu.php';
include_once 'mdl/carnet.php';

$carnet = new carnet();

$membreid=$_SESSION['membreid'];

if(isset($_POST['nb'])) //si des données POST ont été envoyées, on procède à l'ajout ou la modif dans la base
{
  //si les checkbox sont non cochées on met la val à 0
  if(!isset($_POST['M'])){$_POST['M']=0;}
  if(!isset($_POST['N'])){$_POST['N']=0;}
  if(!isset($_POST['L'])){$_POST['L']=0;}
  if(!isset($_POST['W'])){$_POST['W']=0;}

  //d'abord est ce que cette ligne correspond bien au membre ?
  if(isset($_POST['element']) && $carnet->item_ownedby_membre($_POST['element'],$_SESSION['membreid']))
  {
        //modification
        $carnet->modif_saut($_POST);
        
        $message_titre="Modification effectuée";
        $message_corps="Modification de l'élément effecutée";
        $message_couleur="success";
        $message_retour="zelogsv3.php?page=carnet";

        include_once 'vue/message.php';
  }
  else
  {
        //ajout
        $carnet->ajout_saut($_POST);

        $message_titre="Ajout effectué";
        $message_corps="Ajout de l'élément effecutée";
        $message_couleur="success";
        $message_retour="zelogsv3.php?page=carnet";

        include_once 'vue/message.php';
  }
}
else //pas de POST
{

  //sinon on afiche le formulaire d'ajout ou de modification avec les données
  //si on a reçu un itemid on va chercher les données dans la base

  if(isset($_GET['element']))
  {
    //MODIF saut
    $itemid=$_GET['element'];

    $titre_panel="<i class=\"fa fa-edit\"></i> Modification élément";
    //d'abord est ce que cette ligne correspond bien au membre ?
    if($carnet->item_ownedby_membre($itemid,$_SESSION['membreid']))
    {
      //rentrer valeurs du saut en values
      $element=$carnet->ligne_carnet($itemid);

    }
    else
    {
      //retour à la page carnet à cause de l'erreur

    }
  }
  else //AJOUT SAUT
  {
    $titre_panel="<i class=\"fa fa-plus\"></i> Ajout Saut";
    $dernierelement=$carnet->dernier_element($membreid);
    if($dernierelement)
    {
      //il y a un dernier element à prendre en modèle
      $element=$carnet->ligne_carnet($dernierelement);
    }
    else
    {
      //il n'y a pas de dernier element à prendre en modèle, il faut donner des valeurs basiques
      //date du jour
      $element['date']=date("Y-m-d");
      //cases vide
      $element['lieu']="";
      $element['nb']=1;
      $element['hauteur']=3000;
      $element['immat']="";
      $element['principale']="";
      $element['BS']=1;
      $element['TE']=1;
      $element['CA']=1;
      $element['fct']=1;
      $element['M']=0;
      $element['N']=0;
      $element['L']=0;
      $element['W']=0;
      $element['tpsvol']=20;
      $element['com']="";
    }
    //$element=$carnet->ligne_carnet($dernierelement);
    //récupération de valeurs pour l'ajout, soit aucune référence et on prend le dernier ajout
    //soit on a une référence de copie et on prend ces éléments
    //la fonction appelée le fera selon si on renseigne la derniere variable ou Non
  }
  include_once 'vue/carnet/ajout_modif_saut.php';
}




include_once 'vue/foot.php';
