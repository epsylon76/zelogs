<?php
include_once 'fct/calculs.php';
include_once 'fct/globales.php';

//le modèle carnet
include_once 'mdl/carnet.php';
$carnet= new carnet();
$lignes=$carnet->lignes_carnet($_SESSION['membreid']);
//$data = array("draw" => 1, "data" => $lignes);
//$lignesjson = json_encode($data, true);

$ajax_req = '{membreid :'.$_SESSION['membreid'].'}';

$nopage=count($lignes);

if(($nopage % 10) == 0) //multiple de dix, on remonte 10 lignes plus haut
{
  $nopage=$nopage-10;
}
else
{
  $nopage=(floor($nopage / 10)*10); //non multiple de 10, on calcule le quotient de la division par dix qu'on remultiplie
}


include_once 'vue/modules/menu.php';
include_once 'vue/carnet/carnet_ajax.php';
include_once 'vue/modules/datatablesscripts_ajax.php';
