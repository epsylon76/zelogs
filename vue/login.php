<style>
body{
  height:100%!important;
  background-color:#336699;
}
h1{color:white;}
p{color:white;}
</style>
  <div class="container">
    <h1 style="font-family:lato; font-size:70px;"><img src="img/logo_blanc.png" height="100px" width="100px" />Zelogs</h1>
    <p style="font-size:20px;">Application web de gestion de carnet de sauts pour parachutistes professionnels.</p>
    <p style="font-size:20px;">Ecriture rapide des lignes, calculs automatiques, comptages et statistiques</p>
    <p style="font-size:20px;">Imprimez votre carnet au format Papier d'un simple clic</p>

    <div class="row">
      <div class="col-md-4">
        <div class="login-panel panel panel-green">
          <div class="panel-heading">
            <b>Accès</b>
          </div><!-- /panel-heading -->

          <div class="panel-body">

            <form action="zelogsv3.php" method="post">
              <?php
              if(isset($_GET['erreur']))
              {
                if($_GET['erreur']=="compt")
                {echo '<div class="alert alert-danger" role="alert">ERREUR LOGIN, veuillez réessayer</div>';}
                if($_GET['erreur']=="champ")
                {echo '<div class="alert alert-danger" role="alert">ERREUR, un des deux champs est vide</div>';}

              }
              ?>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Utilisateur" name="login"/>

              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Mot de Passe" name="pass"/>

              </div>
            </div>
            <div class="panel-footer">
              <div class="row">
                <div class="col-xs-8">
                  <a href="register.html" class="btn btn-small btn-default">s'enregistrer</a>
                </div><!-- /.col -->
                <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat" name="connexion">Skydive !</button>
                </div><!-- /.col -->
              </div>
            </div>

          </form>
        </div>
      </div>


    <div class="col-md-6">
      <div class="login-panel panel panel-red">
        <div class="panel-heading">
          NEWS
        </div>
        <div class="panel-body">
          <ul>
            <li>Nouvelle interface !</li>
            <li>Choisissez la date de départ du PDF</li>
            <li>Champ de recherche dans tout le carnet</li>
            <li>Base de données des aéronefs</li>
          </ul>
        </div>
      </div>
    </div>

  </div>

</div>









<?php include 'foot.php';?>
