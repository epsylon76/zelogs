<?php
class aeronef
{

  function get_immat($immat)
  {
    global $DB_con;
    $requete = $DB_con->prepare("SELECT * FROM `aeronef` where `afimmat` = :immat");
    $requete->bindParam(':immat', $immat);
    $requete->execute();
    $present = $requete->fetch(PDO::FETCH_ASSOC);
    return $present;
  }

  function type($immat)
  {
    global $DB_con;
    $query=$DB_con->prepare("SELECT `aftype` from `aeronef` where `afimmat` = :immat");
    $query->execute(array(':immat' => $immat));
    $type=$query->fetch();
    return $type[0];
  }

  function ajout_table_aeronef($immat)
  {
    global $DB_con;
    $requete=$DB_con->prepare("INSERT INTO aeronef ( `afimmat`, `aftype`) VALUES (:immat, 'Inconnu')");
    $requete->execute(array(':immat' => $immat));
  }

  function set_immat($immat,$newimmat)
  {
    global $DB_con;
    $requete=$DB_con->prepare("UPDATE Item SET immat = :newimmat where immat = :immat");
    $requete->execute(array(':newimmat' => $newimmat, ':immat' => $immat));
  }

  function set_type($immat,$type)
  {
    global $DB_con;
    $requete=$DB_con->prepare("UPDATE aeronef SET aftype = :type where afimmat = :immat");
    $requete->execute(array(':type' => $type, ':immat' => $immat));
  }

  function liste_af_items()
  {
    global $DB_con;
    $requete="SELECT immat , SUM(nb) as tot from Item group by immat order by tot desc";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }
}
