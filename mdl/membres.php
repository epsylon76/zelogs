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
    $query = $DB_con->prepare("SELECT id FROM membre WHERE login = :login OR mail = :login AND pass_md5 = :pass");
    $query->bindParam(':login', $login);
    $query->bindParam(':pass', md5($pass));
    $query->execute();

    $result = $query->fetch();
    return $result;
  }

  function donnees_membre($id)
  {
    global $DB_con;
    $requete="SELECT * from membre where id='".$id."'";
    $query=$DB_con->query($requete);
    $donnees=$query->fetch(PDO::FETCH_ASSOC);
    return $donnees;
  }

  function donnees_membre_email($email)
  {
    global $DB_con;
    $requete="SELECT * from membre where mail='".$email."'";
    $query=$DB_con->query($requete);
    $donnees=$query->fetch(PDO::FETCH_ASSOC);
    return $donnees;
  }

  function enregistrer_membre($post)
  {
    $length = 12;
    $token = bin2hex(openssl_random_pseudo_bytes($length));
    global $DB_con;
    $pass=md5($post['pass']);
    $requete="INSERT INTO membre
    (
      `id`,
      `login`,
      `mail`,
      `pass_md5`,
      `token`,
      `timestamp`)
      VALUES
      (
        NULL,
        '{$post['login']}',
        '{$post['email']}',
        '{$pass}',
        '{$token}',
        NOW()
      )
    ";
    //echo $requete;
    $DB_con->query($requete);
  }

}
