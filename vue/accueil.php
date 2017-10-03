

<div id="page-wrapper">
  <!-- /.row -->
  <div class="row">

    <div class="col-sm-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-bar-chart-o fa-fw"></i> Nombre de sauts par mois
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div id="morris-area-chart"></div>
        </div>
        <!-- /.panel-body -->
      </div>
    </div>

    <div class="col-sm-3">

      <div class="panel panel-primary">
        <div class="panel-heading" role="button" data-toggle="collapse" data-target="#panel_total">
          <span class="pull-left"><h4>Total</h4></span>
          <span class="pull-right"><h4><?php echo $total; ?></h4></span>
          <div class="clearfix"></div>
        </div>
        <a href="#">
          <div class="panel-footer collapse" id="panel_total">
            <div>
              <span class="pull-left"><?php echo $annee_en_cours;?></span>
              <span class="pull-right"><?php echo $totaln; ?></span>
            </div>
            <div class="clearfix"></div>
            <div>
              <span class="pull-left"><?php echo $annee_avant;?></span>
              <span class="pull-right"><?php echo $total_avant; ?></span>
            </div>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>

      <div class="panel panel-red">
        <div class="panel-heading" role="button" data-toggle="collapse" data-target="#panel_biplace">
          <span class="pull-left"><h4>Biplace</h4></span>
          <span class="pull-right"><h4><?php echo $biplace; ?></h4></span>
          <div class="clearfix"></div>
        </div>
        <a href="#">
          <div class="panel-footer collapse" id="panel_biplace">
            <div>
              <span class="pull-left"><?php echo $annee_en_cours;?></span>
              <span class="pull-right"><?php echo $biplacen; ?></span>
            </div>
            <div class="clearfix"></div>
            <div>
              <span class="pull-left"><?php echo $annee_avant;?></span>
              <span class="pull-right"><?php echo $biplace_avant; ?></span>
            </div>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>

      <div class="panel panel-green">
        <div class="panel-heading"  role="button" data-toggle="collapse" data-target="#panel_solo">
          <span class="pull-left"><h4>Solo</h4></span>
          <span class="pull-right"><h4><?php echo $solo; ?></h4></span>
          <div class="clearfix"></div>
        </div>
        <a href="#">
          <div class="panel-footer collapse" id="panel_solo">
            <div>
              <span class="pull-left"><?php echo $annee_en_cours;?></span>
              <span class="pull-right"><?php echo $solon; ?></span>
            </div>
            <div class="clearfix"></div>
            <div>
              <span class="pull-left"><?php echo $annee_avant;?></span>
              <span class="pull-right"><?php echo $solo_avant; ?></span>
            </div>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>


      <div class="panel panel-red">
        <div class="panel-heading"  role="button" data-toggle="collapse" data-target="#panel_travail">
          <span class="pull-left"><h4>Travail</h4></span>
          <span class="pull-right"><h4><?php echo $travail; ?></h4></span>
          <div class="clearfix"></div>
        </div>
        <a href="#">
          <div class="panel-footer collapse" id="panel_travail">
            <div>
              <span class="pull-left"><?php echo $annee_en_cours;?></span>
              <span class="pull-right"><?php echo $travailn; ?></span>
            </div>
            <div class="clearfix"></div>
            <div>
              <span class="pull-left"><?php echo $annee_avant;?></span>
              <span class="pull-right"><?php echo $travail_avant;?></span>
            </div>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>


    </div>



    <!-- /row -->
  </div>






</div>
