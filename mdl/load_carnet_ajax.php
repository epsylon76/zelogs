<?php

session_start();
header('Content-Type: application/json; charset=utf-8');

// accès réservé au membre connecté, et uniquement à SON carnet (corrigé le 11/11/2026)
if (!isset($_SESSION['login'], $_SESSION['membreid'], $_SESSION['timestamp']) || ($_SESSION['timestamp'] + 3600) <= time()) {
  http_response_code(401);
  echo json_encode(array('data' => array()));
  exit;
}

include_once '../cfg/dbconn.php';
include_once '../fct/globales.php';
include_once '../fct/securite.php';
$id = (int) $_SESSION['membreid'];

//le modèle carnet
include_once '../mdl/carnet.php';
$carnet = new carnet();

$query = $DB_con->prepare("SELECT * from Item where membreid = :id ORDER BY date, itemid");
$query->bindParam(':id', $id);
$query->execute();
$lignes = $query->fetchAll();
$i = 0;
$items = array();

foreach ($lignes as $ligne) {

  $items[$i][0] = '<span style="display:none">' . $ligne['date'] . '</span>' . date_unix_humain($ligne['date']);
  $items[$i][1] = $carnet->icones_type_saut($ligne['BS']) . " <span class='pull-right' style='margin-right:10px;'>{$ligne['nb']}</span>";
  $items[$i][2] = e($ligne['lieu']);
  $items[$i][3] = e($ligne['immat']) . " <a href='https://www.airport-data.com/aircraft/" . e(rawurlencode($ligne['immat'])) . ".html' target='_blank' rel='noopener'><i class='fa fa-search'></i></a>";
  $items[$i][4] = e($ligne['hauteur']);
  $items[$i][5] = e($ligne['principale']);

  $ligne['itemid'] = (int) $ligne['itemid'];
  $actions = '<a href="zelogsv3.php?page=ajout_modif_saut&element=' . $ligne['itemid'] . '"><i class="far fa-edit"></i></a>
            <a href="zelogsv3.php?page=suppr_saut&element=' . $ligne['itemid'] . '"><i class="far fa-trash-alt"></i></a>
            <a href="zelogsv3.php?page=ajout_modif_saut&copie=' . $ligne['itemid'] . '"></i><i class="far fa-copy"></i></a>';
  $items[$i][6] = $actions;
  $i++;
}


$data = array("data" => $items);
$lignesjson = json_encode($data, true);

echo $lignesjson;
