<?php
class arretpdf
{
  function total($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where membreid = ".$membreid." AND date<='".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function biplaces($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS='1' and membreid = ".$membreid." AND date <= '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function solos($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS='0' and membreid = ".$membreid." AND date <= '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function hdv($membreid,$date_arret)
  {
    global $DB_con;
    $requete="SELECT sum(tpsvol) from Item where membreid = ".$membreid." AND date<='".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  //SUR 12 Mois

  function total12($membreid,$date_arret)
  {
    $date12= new datetime($date_arret);
    $newtime = $date12->modify('-1 year')->format('Y-m-d');
    global $DB_con;
    $requete="SELECT sum(nb) from Item where membreid = ".$membreid." AND date between '".$newtime."' and '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function biplaces12($membreid,$date_arret)
  {
    $date12= new datetime($date_arret);
    $newtime = $date12->modify('-1 year')->format('Y-m-d');
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS='1' and membreid = ".$membreid." AND date between '".$newtime."' and '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function solos12($membreid,$date_arret)
  {
    $date12= new datetime($date_arret);
    $newtime = $date12->modify('-1 year')->format('Y-m-d');
    global $DB_con;
    $requete="SELECT sum(nb) from Item where BS='0' and membreid = ".$membreid." AND date between '".$newtime."' and '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

  function hdv12($membreid,$date_arret)
  {
    $date12= new datetime($date_arret);
    $newtime = $date12->modify('-1 year')->format('Y-m-d');
    global $DB_con;
    $requete="SELECT sum(tpsvol) from Item where membreid = ".$membreid." AND date between '".$newtime."' and '".$date_arret."'";
    $query=$DB_con->query($requete);
    $compte=$query->fetch();
    return $compte[0];
  }

}
