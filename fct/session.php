<?php
// Ouverture de la session avec un cookie protégé (11/11/2026) :
// HttpOnly (illisible en JavaScript), SameSite=Lax, Secure derrière NPM en HTTPS.
// Politique de sécurité du contenu (11/11/2026) : tout est hébergé sur le site depuis
// le retrait des CDN ; le JS inline reste autorisé (scripts dans les vues).
if (!headers_sent()) {
  header("Content-Security-Policy: default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data:; font-src 'self' data:; connect-src 'self'; object-src 'none'; base-uri 'self'; form-action 'self'; frame-ancestors 'self'");
}

if (session_status() === PHP_SESSION_NONE) {
  $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');
  ini_set('session.use_strict_mode', '1');
  ini_set('session.use_only_cookies', '1');
  session_set_cookie_params(array(
    'lifetime' => 0,
    'path' => '/',
    'secure' => $https,
    'httponly' => true,
    'samesite' => 'Lax',
  ));
  session_start();
}

// IP réelle du visiteur : NPM (Docker1, 10.0.0.96) la transmet dans X-Real-IP
function ip_client()
{
  $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
  if ($ip === '10.0.0.96' && isset($_SERVER['HTTP_X_REAL_IP']) && filter_var($_SERVER['HTTP_X_REAL_IP'], FILTER_VALIDATE_IP)) {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
  }
  return $ip;
}
