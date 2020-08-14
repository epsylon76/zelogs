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
  }
}
