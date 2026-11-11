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
            <h1 class="is-size-4 title">Mot de passe oublié</h1>
            <?php if (isset($_GET['message']) && $_GET['message'] === 'envoye') { ?>
              <div class="notification is-success is-light">
                Si un compte correspond à cette adresse, un e-mail vient de lui être envoyé avec un lien pour choisir un nouveau mot de passe.
                Le lien est valable 1 heure. Pensez à regarder dans les indésirables.
              </div>
              <p><a href="zelogsv3.php">Retour à la connexion</a></p>
            <?php } else { ?>
              <p class="mb-4">Indiquez l'adresse e-mail de votre compte : vous recevrez un lien pour choisir un nouveau mot de passe.</p>
              <form action="zelogsv3.php?page=mdp_oublie" method="post">
                <?php echo csrf_champ(); ?>
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="email" placeholder="Email" name="email" required autofocus>
                    <span class="icon is-small is-left">
                      <i class="fa fa-envelope"></i>
                    </span>
                  </p>
                </div>
                <?php if (isset($_GET['erreur'])) { ?>
                  <div class="field has-text-danger">
                    <?php echo $_GET['erreur'] === 'email' ? 'Adresse e-mail invalide.' : 'Erreur, veuillez réessayer.'; ?>
                  </div>
                <?php } ?>
                <div class="field">
                  <p class="control">
                    <button class="button is-success" type="submit">Recevoir le lien</button>
                    <a class="has-text-weight-light is-pulled-right" style="margin-top:8px;" href="zelogsv3.php">retour</a>
                  </p>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
