<?php
// Envoi d'e-mails par SMTP (ajouté le 11/11/2026), réglages dans cfg/mail.php (hors git).
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../lib/PHPMailer/Exception.php';
require_once __DIR__ . '/../lib/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../lib/PHPMailer/SMTP.php';

// adresse du site pour les liens envoyés par e-mail
function url_site()
{
  if (is_file(__DIR__ . '/../cfg/mail.php')) {
    require_once __DIR__ . '/../cfg/mail.php';
  }
  return rtrim(defined('MAIL_URL_SITE') ? MAIL_URL_SITE : 'https://zelogs.fr', '/');
}

// renvoie true si le message est parti, false sinon (erreur journalisée)
function envoyer_mail($destinataire, $sujet, $texte, $html = null)
{
  $cfg = __DIR__ . '/../cfg/mail.php';
  if (!is_file($cfg)) {
    error_log('zelogs : cfg/mail.php absent, e-mail non envoyé à ' . $destinataire);
    return false;
  }
  require_once $cfg;

  $mail = new PHPMailer(true);
  try {
    $mail->isSMTP();
    $mail->Host = MAIL_HOTE;
    $mail->Port = MAIL_PORT;
    $mail->SMTPSecure = MAIL_CHIFFREMENT; // 'tls' (STARTTLS, port 587), 'ssl' (465) ou '' (tests)
    $mail->SMTPAutoTLS = MAIL_CHIFFREMENT !== '';
    $mail->SMTPAuth = MAIL_UTILISATEUR !== '';
    $mail->Username = MAIL_UTILISATEUR;
    $mail->Password = MAIL_MOT_DE_PASSE;
    $mail->Timeout = 15;
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->setFrom(MAIL_EXPEDITEUR, MAIL_NOM_EXPEDITEUR);
    $mail->addAddress($destinataire);
    $mail->Subject = $sujet;
    if ($html !== null) {
      $mail->isHTML(true);
      $mail->Body = $html;
      $mail->AltBody = $texte;
    } else {
      $mail->Body = $texte;
    }
    $mail->send();
    return true;
  } catch (Exception $e) {
    error_log('zelogs : échec d\'envoi d\'e-mail à ' . $destinataire . ' : ' . $mail->ErrorInfo);
    return false;
  }
}
