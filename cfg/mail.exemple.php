<?php
// Modèle : copier en cfg/mail.php (non suivi par git, refusé par Apache) et compléter.
// Brevo : Expéditeurs, domaines et IP dédiées > Domaines (zelogs.fr authentifié),
//         SMTP & API > Clés SMTP (identifiant de connexion + clé dédiée à zelogs).
define('MAIL_HOTE', 'smtp-relay.brevo.com');
define('MAIL_PORT', 587);
define('MAIL_CHIFFREMENT', 'tls');
define('MAIL_UTILISATEUR', 'identifiant-de-connexion-smtp-brevo');
define('MAIL_MOT_DE_PASSE', 'cle-smtp-brevo');
define('MAIL_EXPEDITEUR', 'noreply@zelogs.fr');
define('MAIL_NOM_EXPEDITEUR', 'Zelogs');
define('MAIL_URL_SITE', 'https://zelogs.fr');
