<div class="container">

  <div class="section">

    <div class="panel is-primary">
      <div class="panel-heading">
        Carnet
      </div>


      <div class="panel-block" style="padding:20px; overflow-x:auto;">
        <table id="datatables-carnet">
          <thead>
            <tr>
              <th>date</th>
              <th>type & Nb</th>
              <th>Lieu</th>
              <th>Aéronef</th>
              <th>Hauteur</th>
              <th>Parachute</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>

      <div class="panel-block">
        <a class="button is-success" href="zelogsv3.php?page=ajout_modif_saut">
          <span class="icon is-small"><i class="fa fa-plus" aria-hidden="true"></i></span>
          <span>Ajouter un saut</span>
        </a>
      </div>
      <div class="panel-block">
        <form action="zelogsv3.php" method="get" class="form-inline" target="_blank" name="arretcarnet">
          <input type="hidden" name="page" value="arretpdf" />
          <h5>Arrêt de Carnet en date</h5>

          <div class="field has-addons">
            <div class="control">
              <input class="input" type="date" value="<?php echo date('Y') . '-01-01'; ?>" name="date_arret" style="width:200px;">
            </div>

            <div class="control">
              <button class="button is-outlined" type="submit">
                <span class="icon is-small"><i class="far fa-file-pdf"></i></span>
                <span>PDF</span>
              </button>
            </div>
          </div>
        </form>
      </div>

      <div class="panel-block">
        <form action="zelogsv3.php" method="get" class="form-inline" target="_blank" name="carnetpdf">
          <input type="hidden" name="page" value="carnetpdf" />
          <h5>Carnet à partir de la date</h5>
          <div class="field has-addons">
            <div class="control">
              <input class="input" type="date" value="<?php echo date('Y') . '-01-01'; ?>" name="date_debut" style="width:200px;">
            </div>

            <div class="control">
              <button class="button is-outlined" type="submit">
                <span class="icon is-small"><i class="far fa-file-pdf"></i></span>
                <span>PDF</span>
              </button>
            </div>
          </div>
          <small class="text-warning">La création peut prendre 45 secondes</small>
        </form>
      </div>

    </div>
    <!-- /.panel -->
  </div>
  <!-- /.col-lg-12 -->
</div>