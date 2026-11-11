<?php
// Réinitialisation du mot de passe par e-mail (11/11/2026), table mdp_reset.
// Le lien contient un jeton aléatoire ; seule son empreinte SHA-256 est en base.
// Jeton valable 1 heure, à usage unique.

class mdp_reset
{
  const DUREE_MIN = 60;
  const MAX_PAR_IP = 5;      // demandes par heure depuis une même IP
  const MAX_PAR_MEMBRE = 3;  // e-mails par heure pour un même compte

  // membres dont l'adresse e-mail correspond (insensible à la casse)
  function membres_par_email($email)
  {
    global $DB_con;
    $q = $DB_con->prepare("SELECT id, login, mail FROM membre WHERE mail = :mail");
    $q->execute(array(':mail' => $email));
    return $q->fetchAll(PDO::FETCH_ASSOC);
  }

  function trop_de_demandes_ip($ip)
  {
    global $DB_con;
    $q = $DB_con->prepare("SELECT COUNT(*) FROM mdp_reset WHERE ip = :ip AND cree > NOW() - INTERVAL 1 HOUR");
    $q->execute(array(':ip' => $ip));
    return $q->fetchColumn() >= self::MAX_PAR_IP;
  }

  function trop_de_demandes_membre($membreid)
  {
    global $DB_con;
    $q = $DB_con->prepare("SELECT COUNT(*) FROM mdp_reset WHERE membreid = :id AND cree > NOW() - INTERVAL 1 HOUR");
    $q->execute(array(':id' => $membreid));
    return $q->fetchColumn() >= self::MAX_PAR_MEMBRE;
  }

  // trace une demande (membreid NULL si l'adresse est inconnue) ; renvoie le jeton en clair
  function noter_demande($ip, $membreid = null)
  {
    global $DB_con;
    $DB_con->exec("DELETE FROM mdp_reset WHERE cree < NOW() - INTERVAL 1 DAY");
    $jeton = $membreid === null ? null : bin2hex(random_bytes(32));
    $q = $DB_con->prepare("INSERT INTO mdp_reset (membreid, jeton, ip, cree, expire)
      VALUES (:id, :jeton, :ip, NOW(), NOW() + INTERVAL " . self::DUREE_MIN . " MINUTE)");
    $q->execute(array(
      ':id' => $membreid,
      ':jeton' => $jeton === null ? null : hash('sha256', $jeton),
      ':ip' => $ip,
    ));
    return $jeton;
  }

  // membre lié à un jeton encore valable, ou false
  function jeton_valide($jeton)
  {
    global $DB_con;
    if (!is_string($jeton) || !preg_match('/^[a-f0-9]{64}$/', $jeton)) {
      return false;
    }
    $q = $DB_con->prepare("SELECT r.id AS reset_id, m.id, m.login, m.mail FROM mdp_reset r
      JOIN membre m ON m.id = r.membreid
      WHERE r.jeton = :h AND r.utilise IS NULL AND r.expire > NOW()");
    $q->execute(array(':h' => hash('sha256', $jeton)));
    return $q->fetch(PDO::FETCH_ASSOC);
  }

  // nouveau mot de passe, puis tous les jetons du membre deviennent inutilisables
  function changer_mdp($membreid, $mdp)
  {
    global $DB_con;
    $DB_con->beginTransaction();
    $DB_con->prepare("UPDATE membre SET pass_md5 = :hash WHERE id = :id")
      ->execute(array(':hash' => password_hash($mdp, PASSWORD_DEFAULT), ':id' => $membreid));
    $DB_con->prepare("UPDATE mdp_reset SET utilise = NOW() WHERE membreid = :id AND utilise IS NULL")
      ->execute(array(':id' => $membreid));
    $DB_con->commit();
  }
}
