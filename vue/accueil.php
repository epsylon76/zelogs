<div class="container">
  <div class="section">
    <div class="columns">

      <div class="column is-two-third">

        <div class="panel panel-primary">
          <div class="panel-heading">
          <i class="far fa-chart-bar"></i> Tableau de bord comparatif
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <canvas id="graph_annees"></canvas>
          </div>
          <!-- /.panel-body -->
        </div>



      </div>

      <div class="column is-one-third">

        <div class="panel is-info">

          <div class="panel-heading">
            Total<span class="is-pulled-right"><?php echo $total; ?></span>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_en_cours; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $totaln; ?></div>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_avant; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $total_avant; ?></div>
          </div>

        </div>


        <div class="panel is-danger">
          <div class="panel-heading">
            Biplace<span class="is-pulled-right"><?php echo $biplace; ?></span>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_en_cours; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $biplacen; ?></div>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_avant; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $biplace_avant; ?></div>
          </div>
        </div>



        <div class="panel is-success">
          <div class="panel-heading">
            Solo<span class="is-pulled-right"><?php echo $solo; ?></span>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_en_cours; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $solon; ?></div>
          </div>
          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_avant; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $solo_avant; ?></div>
          </div>
        </div>



        <div class="panel is-warning">
          <div class="panel-heading">
            Travail<span class="is-pulled-right"><?php echo $travail; ?></span>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_en_cours; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $travailn; ?></div>
          </div>

          <div class="panel-block">
            <div style="flex:auto"><?php echo $annee_avant; ?></div>
            <div style="flex:auto; text-align:right;"><?php echo $travail_avant; ?></div>
          </div>
        </div>


      </div>
    </div>

  </div>
</div>
</div>