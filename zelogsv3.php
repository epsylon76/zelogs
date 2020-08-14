<?php

session_start();

include_once 'cfg/dbconn.php';
include_once 'fct/globales.php';
include_once 'vue/head.php';

// tout d'abord on teste si l'utilisateur est loggué
//s'il est loggué depuis plus d'une heure il retourne également à la page de login
if (!isset($_SESSION['login']) || !isset($_SESSION['pass_md5']) || ($_SESSION['timestamp'] + 3600) <= time())
//si ce n'est pas le cas on lui affiche la page de login ou
{
  if (isset($_GET['page']) && $_GET['page'] == "register") {
    include_once 'ctrl/user/user_register.php';
  } else {
    include_once('ctrl/user/login.php');
  }
} else //onpeut afficher tout autre page
{
  //on met à jour son timestamp
  $DB_con->query('UPDATE membre SET timestamp=NOW() WHERE id="' . $_SESSION['membreid'] . '" ');
  $_SESSION['timestamp'] = time();

  //si on a pas de paramètre page, on renvoie vers la page principale
  if (!isset($_GET['page'])) {
    include_once 'ctrl/accueil.php';
  } else {
    //on a un paramètre page, on peut charger le controleur demandé
    switch ($_GET['page']) {
      case 'accueil':
        include_once('ctrl/accueil.php');
        break;

      case 'login':
        include_once('ctrl/user/login.php');
        break;

      case 'carnet':
        include_once('ctrl/carnet/carnet.php');
        break;

      case 'ajout_modif_saut':
        include_once 'ctrl/carnet/ajout_modif_saut.php';
        break;

      case 'suppr_saut':
        include_once 'ctrl/carnet/suppr_saut.php';
        break;

      case 'admin':
        include_once 'ctrl/admin/admin.php';
        break;

      case 'carnetpdf':
        include_once 'ctrl/pdf/carnetpdf.php';
        break;

      case 'logout':
        include_once 'ctrl/user/logout.php';
        break;

      case 'tuto':
        include_once 'ctrl/tuto.php';
        break;

      case 'compter':
        include_once 'ctrl/compter.php';
        break;

      case 'arretpdf':
        include_once 'ctrl/pdf/arretpdf.php';
        break;

      default:
        include_once('ctrl/accueil.php');
        break;
    }
  }
}


?>

<script>
  $(".navbar-burger").click(function() {
    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
    $(".navbar-burger").toggleClass("is-active");
    $(".navbar-menu").toggleClass("is-active");

  });
</script>