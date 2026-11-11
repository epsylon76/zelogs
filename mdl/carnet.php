<?php
class carnet
{

  function lignes_carnet($membreid)
  //retourne TOUTES les lignes du carnet du membre
  {
    global $DB_con;
    $req = $DB_con->prepare("SELECT * from `Item`
    LEFT JOIN `aeronef` on `aeronef`.`afimmat` = `Item`.`immat`
    WHERE membreid = :membreid ORDER BY `date`, `itemid`");
    $req->bindParam(':membreid', $membreid);
    $req->execute();
    $lignes = $req->fetchAll(PDO::FETCH_ASSOC);
    return $lignes;
  }


  function premiere_date($membreid)
  {
    global $DB_con;
    $requete = $DB_con->prepare("SELECT min(date) from `Item` where `membreid` = :membreid ");
    $requete->bindParam(':membreid', $membreid);
    $requete->execute();
    $date = $requete->fetch();
    return $date[0];
  }

  function derniere_date($membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT max(date) from Item where membreid = :membreid");
    $query->execute(array(':membreid' => (int) $membreid));
    $date = $query->fetch();
    return $date[0];
  }


  //retourne les valeurs de la ligne demandée
  function ligne_carnet($itemid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT * from Item where itemid = :itemid");
    $query->bindValue(':itemid', (int) $itemid, PDO::PARAM_INT);
    $query->execute();
    $ligne = $query->fetch();
    return $ligne;
  }

  function dernier_element($membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT MAX(itemid) from Item where membreid = :membreid");
    $query->execute(array(':membreid' => (int) $membreid));
    $ligne = $query->fetch();
    $ligne = $ligne[0];
    if (!empty($ligne)) {
      return $ligne;
    } else {
      return false;
    }
  }

  // champs d'une ligne de carnet (requêtes préparées depuis le 11/11/2026)
  private $champs_saut = array('CA', 'date', 'fct', 'lieu', 'immat', 'principale', 'hauteur', 'TE', 'M', 'BS', 'N', 'C', 'W', 'L', 'tpsvol', 'nb', 'com');

  private function valeurs_saut($array)
  {
    $valeurs = array();
    foreach ($this->champs_saut as $champ) {
      $valeurs[':' . $champ] = isset($array[$champ]) ? $array[$champ] : '';
    }
    return $valeurs;
  }

  function ajout_saut($array)
  //ajoute un saut
  {
    global $DB_con;
    $colonnes = '`membreid`, `' . implode('`, `', $this->champs_saut) . '`';
    $marqueurs = ':membreid, :' . implode(', :', $this->champs_saut);
    $req = $DB_con->prepare("INSERT INTO `Item` ($colonnes) VALUES ($marqueurs)");
    $valeurs = $this->valeurs_saut($array);
    $valeurs[':membreid'] = (int) $array['membreid'];
    $req->execute($valeurs);
  }

  function modif_saut($array)
  //modifie un saut (uniquement s'il appartient au membre)
  {
    global $DB_con;
    $sets = array();
    foreach ($this->champs_saut as $champ) {
      $sets[] = "`$champ` = :$champ";
    }
    $req = $DB_con->prepare("UPDATE `Item` SET " . implode(', ', $sets) . " WHERE `itemid` = :itemid AND `membreid` = :membreid");
    $valeurs = $this->valeurs_saut($array);
    $valeurs[':itemid'] = (int) $array['element'];
    $valeurs[':membreid'] = (int) $array['membreid'];
    $req->execute($valeurs);
  }

  function icones_type_saut($BS)
  //retourne l'affichage des icones de type et spécial de saut
  //BS = 1 ou 0
  {
    if ($BS) {
      $affichage = '<img src="img/tandem.png" style="height:20px ; width:32px"/>';
    } else {
      $affichage = '<img src="img/solo.png" style="height:18px; width:32px"/>';
    }
    return $affichage;
  }

  function suppr_saut($element)
  {
    global $DB_con;
    $requete = $DB_con->prepare("DELETE from Item where itemid = :id");
    $requete->bindValue(':id', (int) $element, PDO::PARAM_INT);
    $requete->execute();
  }


  //verifier si l'itemid correspond au membreid
  function item_ownedby_membre($itemid, $membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT COUNT(itemid) from Item where itemid = :itemid and membreid = :membreid");
    $query->bindValue(':itemid', (int) $itemid, PDO::PARAM_INT);
    $query->bindValue(':membreid', (int) $membreid, PDO::PARAM_INT);
    $query->execute();
    $lignes = $query->fetch();
    return $lignes[0] >= 1;
  }

  function compte_sauts($membreid, $annee, $critere, $val_critere)
  {
    global $DB_con;
    $sql = 'SELECT SUM(nb) FROM `Item` WHERE `membreid` = :membreid';
    $params = array(':membreid' => (int) $membreid);
    if ($annee != 0) {
      $sql .= ' AND YEAR(date) = :annee';
      $params[':annee'] = (int) $annee;
    }
    // seules les colonnes TE et BS sont des critères possibles
    if (in_array($critere, array('TE', 'BS'), true)) {
      $sql .= ' AND `' . $critere . '` = :val';
      $params[':val'] = (int) $val_critere;
    }
    $data = $DB_con->prepare($sql);
    $data->execute($params);
    $total = $data->fetchColumn();
    return $total ? $total : 0;
  }

  function comptage($array, $membreid) //fonction de comptage de la page compter
  {
    global $DB_con;
    $sql = "SELECT SUM(nb) from Item where membreid = :membreid AND date BETWEEN :dated AND :datef";
    $params = array(':membreid' => (int) $membreid, ':dated' => $array['dated'], ':datef' => $array['datef']);
    foreach (array('lieu', 'immat', 'principale') as $champ) {
      if (isset($array[$champ]) && $array[$champ] !== '') {
        $sql .= " AND `$champ` = :$champ";
        $params[":$champ"] = $array[$champ];
      }
    }
    // opérateur de hauteur : liste blanche
    if (isset($array['hauteur'], $array['signe']) && $array['hauteur'] !== '' && in_array($array['signe'], array('=', '<', '>'), true)) {
      $sql .= " AND hauteur " . $array['signe'] . " :hauteur";
      $params[':hauteur'] = (int) $array['hauteur'];
    }
    if (isset($array['bisolo']) && in_array($array['bisolo'], array('0', '1'), true)) {
      $sql .= " AND BS = :bs";
      $params[':bs'] = (int) $array['bisolo'];
    }
    if (isset($array['travailent']) && in_array($array['travailent'], array('0', '1'), true)) {
      $sql .= " AND TE = :te";
      $params[':te'] = (int) $array['travailent'];
    }
    // colonne « spécial » : liste blanche
    if (isset($array['special']) && in_array($array['special'], array('M', 'N', 'L', 'W'), true)) {
      $sql .= " AND `" . $array['special'] . "` = 1";
    }
    $query = $DB_con->prepare($sql);
    $query->execute($params);
    return $query->fetchColumn();
  }
  //SECTION select options

  function options_immat($membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT immat, sum(nb) as total from Item where membreid = :membreid group by immat order by total desc");
    $query->execute(array(':membreid' => (int) $membreid));
    $lignes = $query->fetchAll();
    return $lignes;
  }

  function options_lieux($membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT lieu, sum(nb) as total from Item where membreid = :membreid group by lieu order by total desc");
    $query->execute(array(':membreid' => (int) $membreid));
    $lignes = $query->fetchAll();
    return $lignes;
  }

  function options_principale($membreid)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT principale, sum(nb) as total from Item where membreid = :membreid group by principale order by total desc");
    $query->execute(array(':membreid' => (int) $membreid));
    $lignes = $query->fetchAll();
    return $lignes;
  }

  // FIN CLASSE CARNET
}
