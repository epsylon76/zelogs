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
          <form action="zelogsv3.php" method="post">
            <div class="box">
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="email" placeholder="Email" name="login" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Mot de passe" name="pass" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                </p>
              </div>
              <?php
            if (isset($_GET['erreur'])) {             
                echo '<div class="field has-text-danger">Erreur, veuillez réessayer</div>';
            }
            if (isset($_GET['message'])) {
              if($_GET['message'] == 'registerok'){             
              echo '<div class="field has-text-success">Nouveau compte enregistré</div>';
              }
          }
            ?>
              <div class="field">
                <p class="control">
                  <button class="button is-success" type="submit">
                    Skydive !
                  </button>
                  <a class="has-text-weight-light has-text-right is-pulled-right" style="margin-top:20px;" href="new_account.php">
                    créer un compte
                  </a>
                </p>
                
              </div>
              
           
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>