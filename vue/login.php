<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="login-panel panel panel-primary">
        <div class="panel-heading">
          <img src="img/voile.png" height="30px" width="30px" /><b>ZELOGS</b>
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
            <div class="row">
              <div class="col-xs-8">
                <a href="register.html" class="btn btn-small btn-default">s'enregistrer</a>
              </div><!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" name="connexion">Skydive !</button>
              </div><!-- /.col -->
            </div><br>

          </form>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          NEWS
        </div>
        <div class="panel-body">
          <ul>
            <li>Nouvelle interface !</li>
            <li>Choisissez la date de départ du PDF de carnet</li>
            <li>Champ de recherche dans tout le carnet</li>
            <li>Base de données des aéronefs</li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>






</div><!-- /.login-box-body -->
</div><!-- /.login-box -->




</body>
</html>
<?php include 'foot.php';?>
