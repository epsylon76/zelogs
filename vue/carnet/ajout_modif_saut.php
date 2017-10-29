<div id="page-wrapper">

  <!-- /.row -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <?php echo $titre_panel; ?>
        </div>
        <div class="panel-body">
          <form role="form" method="post" class="form-horizontal" name="ajout_modif" data-parsley-validate>
            <div class="row">
              <!-- inputs cachés -->
              <input type="hidden" name="membreid" value="<?php echo $membreid; ?>">
              <?php
              if(isset($itemid))
              {echo '<input type="hidden" name="element" value="'.$itemid.'">';}
              ?>
              <!---COLONNE DE GAUCHE -->
              <div class="col-md-6">

                <div class="form-group">
                  <label class="col-sm-2">Date</label>
                  <div class="col-sm-7">

                    <input class="form-control" type="date" value="<?php echo $element['date'];?>" name="date" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Lieu</label>
                  <div class="col-sm-7">
                    <input class="form-control" type="text" list="lieu" required data-parsley-length="[2, 12]" value="<?php echo $element['lieu'];?>" name="lieu" id="lieu" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Nombre</label>
                  <div class="col-sm-7">
                    <input class="form-control" type="number" min="1" max="700" value="<?php echo $element['nb'];?>" name="nb" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Solo/Biplace</label>
                  <div class="col-sm-7">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary <?php if($element['BS']==1){echo "active";} ?>" >
                        <input type="radio" name="BS" value="1" id="BS_biplace" <?php if($element['BS']==1){echo "checked=checked";} ?>>
                        <img src="img/tandem_blanc.png" style="height:20px"/>  Biplace
                      </label>
                      <label class="btn btn-primary <?php if($element['BS']==0){echo "active";} ?>">
                        <input type="radio" name="BS" value="0" id="BS_solo" <?php if($element['BS']==0){echo "checked";} ?>>
                        <img src="img/solo_blanc.png" style="height:20px;"/>  Solo
                      </label>
                    </div>
                  </div>
                </div>


              </div>
              <!-- FIN COLONNE DE GAUCHE -->


              <!---COLONNE DE DROITE -->

              <div class="col-md-6">



                <div class="form-group">
                  <label class="col-sm-2">Hauteur</label>
                  <div class="col-sm-7">
                    <input class="form-control" type="number" min="1" max="30000" value="<?php echo $element['hauteur'] ?>" name="hauteur" id="hauteur" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Immat Aéronef</label>
                  <div class="col-sm-7">
                    <input type="text" class="form-control" list="immat" name="immat" data-parsley-length="[2, 6]" value="<?php echo $element['immat'];?>" id="immat" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2">Parachute</label>
                  <div class="col-sm-7">
                    <input list="parachute" class="form-control" type="text" name="principale" data-parsley-length="[4, 12]" value="<?php echo $element['principale'];?>" id="principale" required>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2">Travail/Ent.</label>
                  <div class="col-sm-7">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="btn btn-primary <?php if($element['TE']==1){echo "active";} ?>">
                        <input type="radio" name="TE" value="1" id="TE_travail" <?php if($element['TE']==1){echo "checked";} ?>><i class="fa fa-briefcase"></i> Travail
                      </label>
                      <label class="btn btn-primary <?php if($element['TE']==0){echo "active";} ?>">
                        <input type="radio" name="TE" value="0" id="TE_entrainement" <?php if($element['TE']==0){echo "checked";} ?>><i class="fa fa-smile-o"></i> Entrainement
                      </label>
                    </div>
                  </div>
                </div>

              </div><!--col 12 -->
            </div><!-- ROW -->

            <div class="row">
              <div class="col-md-12">
                <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Options de saut spéciales
                </a>
                <div class="collapse" id="collapseExample">
                  <div class="well">



                    <div class="form-group">
                      <label class="col-sm-2">Commandé / Automatique</label>
                      <div class="col-sm-7">
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary <?php if($element['CA']==1){echo "active";} ?>">
                            <input type="radio" name="CA" value="1" <?php if($element['CA']==1){echo "checked";} ?> id="CA_automatique">Commandé
                          </label>
                          <label class="btn btn-primary <?php if($element['CA']==0){echo "active";} ?>">
                            <input type="radio" name="CA" value="0" <?php if($element['CA']==0){echo "checked";} ?> id="CA_commandé">Automatique
                          </label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2">Rôle</label>

                      <div class="col-sm-7">
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary <?php if($element['fct']==1){echo "active";} ?>">
                            <input type="radio" name="fct" value="1" <?php if($element['fct']==1){echo "checked";} ?> id="fct_parachutiste">Parachutiste
                          </label>
                          <label class="btn btn-primary <?php if($element['fct']==2){echo "active";} ?>">
                            <input type="radio" name="fct" value="2" <?php if($element['fct']==2){echo "checked";} ?> id="fct_eleve">Elève
                          </label>
                          <label class="btn btn-primary <?php if($element['fct']==3){echo "active";} ?>">
                            <input type="radio" name="fct" value="3" <?php if($element['fct']==3){echo "checked";} ?> id="fct_largueur">Largueur
                          </label>
                          <label class="btn btn-primary <?php if($element['fct']==4){echo "active";} ?>">
                            <input type="radio" name="fct" value="4" <?php if($element['fct']==4){echo "checked";} ?> id="fct_instructeur">Instructeur
                          </label>
                        </div>
                      </div>

                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Type spécial</label>

                      <div class="col-sm-7">
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-primary <?php if($element['M']){echo "active";} ?>">
                            <input type="checkbox" name="M" value="1" <?php if($element['M']){echo "checked";} ?> id="M"></input>Manifestation
                          </label>
                          <label class="btn btn-primary <?php if($element['N']){echo "active";} ?>">
                            <input type="checkbox" name="N" value="1" id="N" <?php if($element['N']){echo "checked";} ?>></input>Nuit
                          </label>
                          <label class="btn btn-primary <?php if($element['L']){echo "active";} ?>">
                            <input type="checkbox" name="L" value="1" id="L" <?php if($element['L']){echo "checked";} ?>></input>Largage
                          </label>
                          <label class="btn btn-primary <?php if($element['C']){echo "active";} ?>">
                            <input type="checkbox" name="C" value="1" id="C" <?php if($element['C']){echo "checked";} ?>></input>Compétition
                          </label>
                          <label class="btn btn-primary <?php if($element['W']){echo "active";} ?>">
                            <input type="checkbox" name="W" value="1" id="W" <?php if($element['W']){echo "checked";} ?>></input>Wingsuit
                          </label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                      <label class="col-sm-2">Temps de vol</label>

                      <div class="col-sm-3">
                        <input type="number" min="1" max="600" name='tpsvol' class='form-control' value="20" value="<?php echo $element['tpsvol'];?>" id="tpsvol" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2">Commentaire</label>
                      <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name="com"><?php echo $element['com'];?></textarea>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <button class="btn btn-lg btn-success">Envoyer</button>
            </div>
          </div>

          </form>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>

<!-- /#page-wrapper -->
