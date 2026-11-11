<?php
// anti-robot (11/11/2026) : heure d'affichage du formulaire gardée en session
include_once 'fct/session.php';
$_SESSION['inscription_t'] = time();
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="johanpupin.com">

  <title>Zelogs - carnet de saut Parapro</title>

  <link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans:600" rel="stylesheet">

  <!-- Bulma CSS -->
  <link href="dist/css/bulma.min.css" rel="stylesheet">
  <link href="dist/css/bulma-checkradio.css" rel="stylesheet">
  <!-- font awesome -->
  <link href="dist/css/all.min.css" rel="stylesheet">



</head>

<body>
  <style>
    body {
      background-color: #336699;
    }
  </style>
  <section class="hero is-fullheight is-bold">
    <div class="hero-body">
      <div class="container">
        <div class="columns">
          <div class="column is-4">
            <h1 class="title has-text-white">
              <img src="img/logo_blanc.png" height="150px" width="150px" />
              Zelogs
            </h1>
            <h2 class="subtitle has-text-white">
              Carnet de sauts pour parachutistes professionnels.
            </h2>
          </div>

          <div class="column is-4">
            <div class="box">
              <h1 class="is-size-3 title">Nouveau Compte</h1>

              <form action="zelogsv3.php?page=register" method="post" name="register">
                <?php
                if (isset($_GET['erreur'])) {
                ?>
                  <div class="field">
                    <p class="has-text-danger">
                      <?php
                      switch($_GET['erreur']){
                        case 'correspondance':
                          echo "Les mots de passe ne correspondent pas";
                        break;

                        case 'email':
                          echo "Cet email est déjà enregistré";
                        break;

                        case 'deja':
                          echo "Cet identifiant est déjà pris";
                        break;

                        case 'robot':
                          echo "Réponse anti robots incorrecte";
                        break;

                        case 'invalide':
                          echo "Identifiant, e-mail ou mot de passe (6 caractères minimum) invalide";
                        break;
                      }
                      ?>
                    </p>
                  </div>
                <?php
                }
                ?>
                <div class="field">
                  <input type="text" class="input" placeholder="Utilisateur" name="login" required />
                </div>

                <div class="field">
                  <input type="password" class="input" placeholder="Mot de Passe (6 caractères minimum)" name="pass" id="pass" minlength="6" required />
                </div>

                <div class="field">
                  <input type="password" class="input" placeholder="Confirmez le Mot de Passe" name="pass_confirm" id="pass_confirm" required />
                </div>

                <div class="field">
                  <input type="email" class="input" placeholder="Votre email" name="email" required />
                </div>

                <!-- champ piège : invisible pour un humain, rempli par les robots -->
                <div style="position:absolute; left:-10000px; top:auto; width:1px; height:1px; overflow:hidden;" aria-hidden="true">
                  <label for="site_web">Ne pas remplir</label>
                  <input type="text" name="site_web" id="site_web" value="" tabindex="-1" autocomplete="off" />
                </div>

                <div class="field">
                  <input type="text" class="input" placeholder="Quel mois sommes nous ?" name="test" required />
                  <label style="font-size:10px">sans accents ni majuscule ni espaces</label>
                </div>


                <div class="field">
                  <button type="submit" class="button is-success" name="connexion">S'enregistrer</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>


</html>