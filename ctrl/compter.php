<?php

include_once 'vue/modules/menu.php';
include_once 'fct/globales.php';
include_once 'mdl/carnet.php';
$carnet = new carnet();

$membreid=$_SESSION['membreid'];

$options_immat=$carnet->options_immat($membreid);
$options_lieux=$carnet->options_lieux($membreid);
$options_principale=$carnet->options_principale($membreid);

$resultat = 0;

if(isset($_POST['dated']) && isset($_POST['datef']))
{
  $dated=$_POST['dated']; //pour rendre plus lisible la vue, je préfère changer le nom des var
  $datef=$_POST['datef'];
  $lieu=$_POST['lieu'];
  $immat=$_POST['immat'];
  $principale=$_POST['principale'];
  $hauteur=$_POST['hauteur'];
  $signe=$_POST['signe'];
  $bisolo=$_POST['bisolo'];
  $travailent=$_POST['travailent'];
  $special=$_POST['special'];

  //on compte seulement si les deux dates sont definies
  if(!empty($dated) && !empty($datef))
  {
    //on passe l'array POST dans la fonction de comptage
    if(!empty($special)){$_POST['special'] = trad_spe($special);}
    $result = $carnet->comptage($_POST,$membreid);
    if($result!=null){$resultat=$result;}
  }
}

include_once 'vue/compter.php';
