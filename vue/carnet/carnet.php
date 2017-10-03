<div id="page-wrapper">

  <div class="row" >
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Carnet
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">
          <table width="100%" class="table table-striped table-bordered table-hover table-condensed" id="datatables-carnet">
            <thead>
              <tr>
                <th>date</th>
                <th>Nb</th>
                <th>Lieu</th>
                <th>Aéronef</th>
                <th>Hauteur</th>
                <th>Parachute</th>
                <th>Type</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach($lignes as $ligne)
              {
                $type=$carnet->icones_type_saut($ligne['itemid']);

                $date=date_unix_humain($ligne['date']);
                $bouton_modif="<a href=\"zelogsv3.php?page=ajout_modif_saut&element={$ligne['itemid']}\"><i class=\"fa fa-edit\"></i></a>";
                $bouton_suppr="<a href=\"zelogsv3.php?page=suppr_saut&element={$ligne['itemid']}\"><i class=\"fa fa-trash\"></i></a>";
                $actions="</i><i class=\"fa fa-eye\"></i><i class=\"fa fa-copy\"></i>";

                echo "<tr class=\"odd gradeX\">";
                echo "<td>{$date}</td>";
                echo "<td>{$ligne['nb']}</td>";
                echo "<td>{$ligne['lieu']}</td>";
                echo "<td>{$ligne['immat']}</td>";
                echo "<td>{$ligne['hauteur']}</td>";
                echo "<td>{$ligne['principale']}</td>";
                echo "<td>{$type}</td>";
                echo "<td>{$bouton_modif} {$bouton_suppr} {$actions}</td>";
                echo "</tr>";

              }
              ?>
            </tbody>
          </table>
          <!-- /.table-responsive -->
          <div class="well">
            <a class="btn btn-lg btn-success" href="zelogsv3.php?page=ajout_modif_saut"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter un saut</a>
            <hr>
            <div class="row">
              <form  class="form-inline" action="zelogsv3.php" method="get">
                <div  class="col-xs-12">
                  <input type="hidden" name="page" value="carnetpdf"/>
                  <input class="form-control input-lg" type="date" value="<?php echo date('Y').'-01-01';?>" name="date_debut" style="width:200px;">
                  <button class="btn btn-lg btn-default pdfbutton" type="submit">&nbsp;&nbsp;<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i>  PDF </button>
                </div>
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
