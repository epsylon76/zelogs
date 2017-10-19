<?php
class arretpdf
{
  function total($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where membreid = ".$membreid." AND date<=".$date_arret;
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $comtpe[0];
  }

  function biplaces($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS=1 and membreid = ".$membreid." AND date<=".$date_arret;
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $comtpe[0];
  }

  function solos($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS=0 and membreid = ".$membreid." AND date<=".$date_arret;
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $comtpe[0];
  }

  function hdv($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(tpsvol) from Item where membreid = ".$membreid." AND date<=".$date_arret;
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $comtpe[0];
  }
}
