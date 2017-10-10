<?php
class aeronef
{
  function af_present($immat)
  {
    global $DB_con;
    $requete="SELECT count(immat) from aeronef where immat = '".$immat."'";
    $query=$DB_con->query($requete);
    $present=$query->fetch();
    return $present[0];
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
    $requete="SELECT immat , SUM(nb) as nb from Item group by immat order by nb desc";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }
}
