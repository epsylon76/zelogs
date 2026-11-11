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

  // Connexion par identifiant ou e-mail.
  // Les mots de passe sont en password_hash() depuis le 11/11/2026 ; les anciens MD5
  // sont acceptés une dernière fois puis convertis automatiquement (colonne pass_md5 en TEXT).
  function login($login,$pass)
  {
    global $DB_con;
    $query = $DB_con->prepare("SELECT id, pass_md5 FROM membre WHERE login = :login OR mail = :mail");
    $query->bindValue(':login', $login);
    $query->bindValue(':mail', $login);
    $query->execute();

    foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $membre) {
      $hash = $membre['pass_md5'];
      $ok = false;
      if (preg_match('/^[a-f0-9]{32}$/i', $hash)) {
        $ok = hash_equals(strtolower($hash), md5($pass));
      } else {
        $ok = password_verify($pass, $hash);
      }
      if ($ok) {
        if (preg_match('/^[a-f0-9]{32}$/i', $hash) || password_needs_rehash($hash, PASSWORD_DEFAULT)) {
          $maj = $DB_con->prepare("UPDATE membre SET pass_md5 = :hash WHERE id = :id");
          $maj->execute(array(':hash' => password_hash($pass, PASSWORD_DEFAULT), ':id' => $membre['id']));
        }
        return array('id' => $membre['id']);
      }
    }
    return false;
  }

  function donnees_membre($id)
  {
    global $DB_con;
    $query=$DB_con->prepare("SELECT * from membre where id = :id");
    $query->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $query->execute();
    $donnees=$query->fetch(PDO::FETCH_ASSOC);
    return $donnees;
  }

  function donnees_membre_login($login)
  {
    global $DB_con;
    $query=$DB_con->prepare("SELECT * from membre where login = :login");
    $query->bindValue(':login', $login);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function donnees_membre_email($email)
  {
    global $DB_con;
    $query=$DB_con->prepare("SELECT * from membre where mail = :mail");
    $query->bindValue(':mail', $email);
    $query->execute();
    $donnees=$query->fetch(PDO::FETCH_ASSOC);
    return $donnees;
  }

  function enregistrer_membre($data)
  {
    $length = 12;
    global $DB_con;
    $pass=password_hash($data['pass'], PASSWORD_DEFAULT);
    $requete= $DB_con->prepare("INSERT INTO membre (
      `id`,
      `login`,
      `mail`,
      `pass_md5`,
      `timestamp`)
      VALUES
      (
        NULL,
        :login,
        :email,
        :pass,
        NOW()
      )");

      $requete->bindParam(':login', $data['login']);
      $requete->bindParam(':email', $data['email']);
      $requete->bindParam(':pass', $pass);
    //echo $requete;
   $requete->execute();
  }

}
