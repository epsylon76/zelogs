<?php
class aeronef
{
  function get_immat($immat)
  {
    global $DB_con;
    $requete = $DB_con->prepare("SELECT * from aeronef where `immat` = :immat");
    $requete->bindParam(':immat', $immat);
    $requete->execute();
    $present = $requete->fetch(PDO::FETCH_ASSOC);
    return $present;
  }

  function type($immat)
  {
    global $DB_con;
    $requete="SELECT aftype from aeronef where immat = '".$immat."'";
    $query=$DB_con->query($requete);
    $type=$query->fetch();
    return $type[0];
  }

  function ajout_table_aeronef($immat)
  {
    global $DB_con;
    $requete="INSERT INTO aeronef ( `immat`, `aftype`) VALUES ('".$immat."', 'Inconnu')";
    $query=$DB_con->query($requete);
  }

  function set_immat($immat,$newimmat)
  {
    global $DB_con;
    $requete="UPDATE Item SET immat = '".$newimmat."' where immat = '".$immat."'";
    $query=$DB_con->query($requete);
    echo $requete;
  }

  function set_type($immat,$type)
  {
    global $DB_con;
    $requete="UPDATE aeronef SET aftype = '".$type."' where immat = '".$immat."'";
    $query=$DB_con->query($requete);
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
