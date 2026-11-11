<?php

//retourne le nombre de sauts par mois dans l'année demandée
function nbsautsmois($annee)
{
  global $DB_con;
  $recapsaut = array();
  for ($m = 1; $m <= 12; $m++) {
    $recapsaut[$m] = "0";
  }
  $sql = $DB_con->prepare('SELECT MONTH(date) AS mois, SUM(nb) AS total FROM `Item`
    WHERE YEAR(date) = :annee AND membreid = :membreid GROUP BY MONTH(date)');
  $sql->execute(array(':annee' => (int) $annee, ':membreid' => (int) $_SESSION['membreid']));
  foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne) {
    if ($ligne['total'] > 0) {
      $recapsaut[(int) $ligne['mois']] = $ligne['total'];
    }
  }
  return $recapsaut;
}

function date_premier_saut($membreid)
{
  global $DB_con;
  $sql = $DB_con->prepare("SELECT MIN(date)
  FROM `Item`
  WHERE  `membreid` =  :membreid ");
  $sql->bindParam(':membreid', $membreid);
  $sql->execute();
  $data = $sql->fetch();

  if ($data[0] == "") {
    $data[0] = 0;
  }
  $datepremier = $data[0];
  return $datepremier;
}


function date_dernier_saut($membreid)
{
  global $DB_con;
  $sql = $DB_con->prepare("SELECT MAX(date)
  FROM `Item`
  WHERE  `membreid` =  :membreid ");
  $sql->bindParam(':membreid', $membreid);
  $sql->execute();
  $data = $sql->fetch();

  if ($data[0] == "") {
    $data[0] = 0;
  }
  $datedernier = $data[0];
  return $datedernier;
}



function heures_et_minutes($minutes_entree)
{
  $heures = floor($minutes_entree / 60);
  $minutes = $minutes_entree % 60;
  return $heures . 'h' . $minutes . 'm';
}



function tps_vol($membreid, $annee)
{
  global $DB_con;
  $sql = 'SELECT SUM(tpsvol * nb) FROM `Item` WHERE `membreid` = :membreid';
  $params = array(':membreid' => (int) $membreid);
  if ($annee != 0) {
    $sql .= ' AND YEAR(date) = :annee';
    $params[':annee'] = (int) $annee;
  }
  $data = $DB_con->prepare($sql);
  $data->execute($params);
  $tps = $data->fetchColumn();
  return $tps ? $tps : 0;
}

function num_array_ligne($lignes, $date)  //retourne la clé de la première ligne à ou après la date donnée (numéro de ligne)
{
  // réécrit le 11/11/2026 : l'ancienne version avançait jour par jour et bouclait
  // indéfiniment si aucune ligne n'existait après la date demandée
  $date = (new DateTime($date))->format('Y-m-d');
  foreach ($lignes as $cle => $ligne) {
    if ($ligne['date'] >= $date) {
      return $cle;
    }
  }
  return max(0, count($lignes) - 1);
}
