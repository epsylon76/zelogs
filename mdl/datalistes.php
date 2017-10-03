<?php
class datalistes
{
  function datalist_immat($membreid)
  {
    global $DB_con;
    $requete="SELECT count(itemid) as fois, afimmat from Item where membreid = ".$membreid." GROUP BY afimmat ORDER BY fois DESC";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchALL(PDO::FETCH_ASSOC);
    $liste="";
    foreach($lignes as $option)
    {
      $liste=$liste."<option value=\"".$option['afimmat']."\">".$option['afimmat']."</option>";
    }
    return $liste;
  }

  function datalist_parachute($membreid)
  {
    global $DB_con;
    $requete="SELECT count(itemid) as fois, principale from Item where membreid = ".$membreid." GROUP BY principale ORDER BY fois DESC";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchALL(PDO::FETCH_ASSOC);
    $liste="";
    foreach($lignes as $option)
    {
      $liste=$liste."<option value=\"".$option['principale']."\">".$option['principale']."</option>";
    }
    return $liste;
  }

  function datalist_lieu($membreid)
  {
    global $DB_con;
    $requete="SELECT count(itemid) as fois, lieu from Item where membreid = ".$membreid." GROUP BY lieu ORDER BY fois DESC";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchALL(PDO::FETCH_ASSOC);
    $liste="";
    foreach($lignes as $option)
    {
      $liste=$liste."<option value=\"".$option['lieu']."\">".$option['lieu']."</option>";
    }
    return $liste;
  }






}
