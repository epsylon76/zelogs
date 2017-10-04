<?php

include_once 'vue/modules/menu.php';

//le modèle carnet
include_once 'mdl/carnet.php';

$carnet = new carnet();

$membreid=$_SESSION['membreid'];

//s'il y a un élément en POST on vérifie qu'on en est bien le propriétaire
if(isset($_GET['element']) && $carnet->item_ownedby_membre($_GET['element'],$_SESSION['membreid']))
{
  if(isset($_GET['go'])){
    //supression du saut confirmée
    $carnet->suppr_saut($_GET['element']);

    $message_corps="élément supprimé avec succès";
    $message_titre="élément supprimé";
    $message_couleur="success";
    $message_retour="zelogsv3.php?page=carnet";
  }else {
    //message de confirmation
    $message_titre="Supression élément";
    $message_corps="Voulez vous vraiment supprimer cette ligne ?";
    $message_couleur="red";
    $message_retour="zelogsv3.php?page=carnet";
    $message_url="zelogsv3.php?page=suppr_saut&element={$_GET['element']}&go=go";
  }
  include_once 'vue/modules/message.php';
}
else {
  //retour à la page carnet
}
