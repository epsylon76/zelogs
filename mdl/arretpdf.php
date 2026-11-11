<?php
// Totaux de l'arrêt de carnet (réécrit le 11/11/2026 : requêtes préparées,
// heures de vol = SUM(nb * tpsvol) comme dans le carnet PDF, au lieu de SUM(tpsvol)).
class arretpdf
{
  private function somme($expr, $membreid, $date_arret, $sur12mois, $bs = null)
  {
    global $DB_con;
    $sql = "SELECT SUM($expr) FROM Item WHERE membreid = :membreid AND date <= :date_arret";
    $params = array(':membreid' => (int) $membreid, ':date_arret' => $date_arret);
    if ($sur12mois) {
      $debut = new DateTime($date_arret);
      $sql .= " AND date >= :debut";
      $params[':debut'] = $debut->modify('-1 year')->format('Y-m-d');
    }
    if ($bs !== null) {
      $sql .= " AND BS = :bs";
      $params[':bs'] = $bs;
    }
    $req = $DB_con->prepare($sql);
    $req->execute($params);
    $total = $req->fetchColumn();
    return $total ? $total : 0;
  }

  function total($membreid, $date_arret)     { return $this->somme('nb', $membreid, $date_arret, false); }
  function biplaces($membreid, $date_arret)  { return $this->somme('nb', $membreid, $date_arret, false, 1); }
  function solos($membreid, $date_arret)     { return $this->somme('nb', $membreid, $date_arret, false, 0); }
  function hdv($membreid, $date_arret)       { return $this->somme('nb * tpsvol', $membreid, $date_arret, false); }

  //SUR 12 Mois
  function total12($membreid, $date_arret)    { return $this->somme('nb', $membreid, $date_arret, true); }
  function biplaces12($membreid, $date_arret) { return $this->somme('nb', $membreid, $date_arret, true, 1); }
  function solos12($membreid, $date_arret)    { return $this->somme('nb', $membreid, $date_arret, true, 0); }
  function hdv12($membreid, $date_arret)      { return $this->somme('nb * tpsvol', $membreid, $date_arret, true); }
}
