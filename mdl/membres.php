<?php
class membres
{
  function liste_membres()
  {
    global $DB_con;
    $requete="SELECT * from membre where 1 order by timestamp DESC";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }

  function login($login,$pass)
  {
    global $DB_con;
    $requete='SELECT count(*) as nb FROM membre WHERE login="'.mysql_escape_string($login).'" AND pass_md5="'.mysql_escape_string(md5($pass)).'"';
    $query=$DB_con->query($requete);
    $result=$query->fetch();
    $result=$result[0];

    return $result;
  }

  function donnees_membre($login)
  {
    global $DB_con;
    $requete="SELECT * from membre where login='".$login."'";
    $query=$DB_con->query($requete);
    $donnees=$query->fetch(PDO::FETCH_ASSOC);
    return $donnees;
  }

}
