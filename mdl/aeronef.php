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

  function liste_af_items()
  {
    global $DB_con;
    $requete="SELECT immat , SUM(nb) as nb from Item group by immat order by nb desc";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }
}
