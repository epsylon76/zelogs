<?php
class carnet
{

  function lignes_carnet($membreid)
  //retourne TOUTES les lignes du carnet du membre
  {
    global $DB_con;
    $requete="SELECT * from Item where membreid = ".$membreid." ORDER BY date, itemid";
    $query=$DB_con->query($requete);
    $lignes=$query->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }


  function premiere_date($membreid)
  {
    global $DB_con;
    $requete="SELECT min(date) from Item where membreid = ".$membreid;
    $query=$DB_con->query($requete);
    $date=$query->fetch();
    return $date[0];
  }

  function derniere_date($membreid)
  {
    global $DB_con;
    $requete="SELECT max(date) from Item where membreid = ".$membreid;
    $query=$DB_con->query($requete);
    $date=$query->fetch();
    return $date[0];
  }


  //retourne les valeurs de la ligne demandée
  function ligne_carnet($itemid)
  {
    global $DB_con;
    $requete="SELECT * from Item where itemid = ".$itemid;
    $query=$DB_con->query($requete);
    $ligne=$query->fetch();
    return $ligne;
  }

  function dernier_element($membreid)
  {
    global $DB_con;
    $requete="SELECT MAX(itemid) from Item where membreid = ".$membreid;
    $query=$DB_con->query($requete);
    $ligne=$query->fetch();
    $ligne=$ligne[0];
    if(!empty($ligne))
    {
      return $ligne;
    }
    else
    {
      return false;
    }
  }

  function ajout_saut($array)
  //ajoute un saut
  {
    global $DB_con;
    $requete="
    INSERT INTO `Item`
    (
      `itemid`,
      `membreid`,
      `CA`,
      `date`,
      `fct`,
      `lieu`,
      `immat`,
      `principale`,
      `hauteur`,
      `TE`,
      `M`,
      `BS`,
      `N`,
      `W`,
      `L`,
      `tpsvol`,
      `nb`,
      `com`
      )
      VALUES
      (
        NULL,
        '{$array['membreid']}',
        '{$array['CA']}',
        '{$array['date']}',
        '{$array['fct']}',
        '{$array['lieu']}',
        '{$array['immat']}',
        '{$array['principale']}',
        '{$array['hauteur']}',
        '{$array['TE']}',
        '{$array['M']}',
        '{$array['BS']}',
        '{$array['N']}',
        '{$array['W']}',
        '{$array['L']}',
        '{$array['tpsvol']}',
        '{$array['nb']}',
        '{$array['com']}'
        )";
        $query=$DB_con->query($requete);
      }

      function modif_saut($array)
      //modifie un saut
      {
        global $DB_con;
        $requete="
        UPDATE `Item`
        SET
          `membreid`= '{$array['membreid']}',
          `CA`= '{$array['CA']}',
          `date`= '{$array['date']}',
          `fct` = '{$array['fct']}',
          `lieu` = '{$array['lieu']}',
          `immat` = '{$array['immat']}',
          `principale` = '{$array['principale']}',
          `hauteur` = '{$array['hauteur']}',
          `TE` = '{$array['TE']}',
          `M` = '{$array['M']}',
          `BS` = '{$array['BS']}',
          `N` = '{$array['N']}',
          `W` = '{$array['W']}',
          `L` = '{$array['L']}',
          `tpsvol` = '{$array['tpsvol']}',
          `nb` = '{$array['nb']}',
          `com` = '{$array['com']}'
          where
          `itemid` = '{$array['element']}'
          ";
            $query=$DB_con->query($requete);
          }

      function icones_type_saut($itemid)
      //retourne l'affichage des icones de type et spécial de saut
      {
        global $DB_con;
        $requete="SELECT TE,BS,M,N,W from Item where itemid = ".$itemid;
        $query=$DB_con->query($requete);
        $ligne=$query->fetch();
        $affichage="";

        if($ligne['BS']==1)
        {
          $affichage=$affichage."<img src=\"img/tandem.png\" style=\"height:20px\"/>";
        }
        else {
          $affichage=$affichage."<img src=\"img/solo.png\" style=\"height:20px\"/>";
        }

        return $affichage;
      }

      function suppr_saut($element)
      {
        global $DB_con;
        $requete="DELETE from Item where itemid = ".$element;
        $query=$DB_con->query($requete);
      }


      //verifier si l'itemid correspond au membreid
      function item_ownedby_membre($itemid,$membreid)
      {
        global $DB_con;
        $requete="SELECT COUNT(itemid) from Item where itemid = ".$itemid." and membreid = ".$membreid;
        $query=$DB_con->query($requete);
        $lignes=$query->fetch();
        return $lignes[0]>=1;
      }

      function compte_sauts($membreid,$annee,$critere,$val_critere)
      {
        global $DB_con;
        //on paramètre les arguments
        if($annee!=0){$arg1="AND YEAR(date) = ".$annee;}ELSE{$arg1="";}
        if($critere!="0"){$arg2="AND ".$critere."=".$val_critere;}ELSE{$arg2="";}

        $sql = '
        SELECT SUM(nb)
        FROM `Item`
        WHERE  `membreid` =  "'.mysql_escape_string($membreid).'"
        '.$arg1.'
        '.$arg2.'
        ';
        //echo $sql;
        $data = $DB_con->query($sql);
        $data = $data->fetch(PDO::FETCH_BOTH);
        if($data[0]=="")
        {
          $data[0]=0;
        }
        return $data[0];
      }
      function compte_entre($array)
      {
        foreach($ARRAY as $key=>$value)
        {$$key = $value;}
        
      }

      // FIN CLASSE CARNET
    }
