<?php

// session déjà ouverte par zelogsv3.php

// Détruit toutes les variables de session
$_SESSION = array();

// Finalement, on détruit la session (et son cookie).
if (ini_get('session.use_cookies')) {
  $prm = session_get_cookie_params();
  setcookie(session_name(), '', time() - 42000, $prm['path'], $prm['domain'], $prm['secure'], $prm['httponly']);
}
session_destroy();

header('Location: zelogsv3.php');
exit();
?>
