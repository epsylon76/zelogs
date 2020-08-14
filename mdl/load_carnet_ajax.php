<?php

include_once '../cfg/dbconn.php';
include_once '../fct/globales.php';
$id = $_POST['membreid'];

//le modèle carnet
include_once '../mdl/carnet.php';
$carnet = new carnet();

$query = $DB_con->prepare("SELECT * from Item where membreid = :id ORDER BY date, itemid");
$query->bindParam(':id', $id);
$query->execute();
$lignes = $query->fetchAll();
$i = 0;

foreach ($lignes as $ligne) {

  $items[$i][0] = '<span style="display:none">' . $ligne['date'] . '</span>' . date_unix_humain($ligne['date']);
  $items[$i][1] = $carnet->icones_type_saut($ligne['BS']) . " <span class='pull-right' style='margin-right:10px;'>{$ligne['nb']}</span>";
  $items[$i][2] = $ligne['lieu'];
  $items[$i][3] = $ligne['immat'] . " <a href='http://www.airport-data.com/aircraft/" . $ligne['immat'] . ".html' target='_blank'><i class='fa fa-search'></i></a>";
  $items[$i][4] = $ligne['hauteur'];
  $items[$i][5] = $ligne['principale'];

  $actions = '<a href="zelogsv3.php?page=ajout_modif_saut&element=' . $ligne['itemid'] . '"><i class="far fa-edit"></i></a>
            <a href="zelogsv3.php?page=suppr_saut&element=' . $ligne['itemid'] . '"><i class="far fa-trash-alt"></i></a>
            <a href="zelogsv3.php?page=ajout_modif_saut&copie=' . $ligne['itemid'] . '"></i><i class="far fa-copy"></i></a>';
  $items[$i][6] = $actions;
  $i++;
}


$data = array("data" => $items);
$lignesjson = json_encode($data, true);

echo $lignesjson;
