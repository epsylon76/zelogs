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
            <h1 class="is-size-4 title">Nouveau mot de passe</h1>
            <?php if (!$membre_reset) { ?>
              <div class="notification is-warning is-light">
                Ce lien n'est plus valable : il a expiré (1 heure) ou a déjà servi.
              </div>
              <p><a href="zelogsv3.php?page=mdp_oublie">Demander un nouveau lien</a></p>
            <?php } else { ?>
              <p class="mb-4">Compte : <strong><?php echo e($membre_reset['login']); ?></strong></p>
              <form action="zelogsv3.php?page=mdp_reset&amp;t=<?php echo e($jeton); ?>" method="post">
                <?php echo csrf_champ(); ?>
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Nouveau mot de passe (6 caractères minimum)" name="pass" minlength="6" required autofocus autocomplete="new-password">
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                  </p>
                </div>
                <div class="field">
                  <p class="control has-icons-left">
                    <input class="input" type="password" placeholder="Confirmer le mot de passe" name="pass_confirm" minlength="6" required autocomplete="new-password">
                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                  </p>
                </div>
                <?php if ($erreur !== '') { ?>
                  <div class="field has-text-danger">
                    <?php
                    switch ($erreur) {
                      case 'court': echo '6 caractères minimum.'; break;
                      case 'correspondance': echo 'Les deux mots de passe ne correspondent pas.'; break;
                      default: echo 'Erreur, veuillez réessayer.';
                    }
                    ?>
                  </div>
                <?php } ?>
                <div class="field">
                  <button class="button is-success" type="submit">Enregistrer</button>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
