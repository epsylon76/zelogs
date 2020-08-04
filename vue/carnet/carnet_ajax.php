<div class="container" >

  <div class="row" >
    <div class="col-lg-12" >
      <div class="panel panel-primary">
        <div class="panel-heading">
          Carnet
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body" style="padding:4px;">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table width="100%" class="" id="datatables-carnet">
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
          </div>
          <!-- /.table-responsive -->
          <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
              <div class="well">
                <a class="btn btn-lg btn-success" href="zelogsv3.php?page=ajout_modif_saut"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un saut</a>
                <hr>

                <form action="zelogsv3.php" method="get" class="form-inline" target="_blank" name="arretcarnet">
                  <input type="hidden" name="page" value="arretpdf"/>
                  <h5>Arrêt de Carnet en date</h5>
                  <input class="form-control" type="date" value="<?php echo date('Y').'-01-01';?>" name="date_arret" style="width:200px;">
                  <button class="btn btn-default pdfbutton" type="submit">&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i>  PDF </button>
                </form>

                <form action="zelogsv3.php" method="get" class="form-inline" target="_blank" name="carnetpdf">
                  <input type="hidden" name="page" value="carnetpdf"/>
                  <h5>Carnet à partir de la date</h5>
                  <input class="form-control" type="date" value="<?php echo date('Y').'-01-01';?>" name="date_debut" style="width:200px;">
                  <button class="btn btn-default pdfbutton" type="submit">&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i>  PDF </button>
                  <br>
                  <small class="text-warning">La création peut prendre 45 secondes</small>
                </form>

              </div>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
  </div>
</div>
