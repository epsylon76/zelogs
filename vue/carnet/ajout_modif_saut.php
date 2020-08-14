<div class="container">
  <div class="section">

    <div class="box has-background-info-darker">
      <p class="title has-text-white">
        <?php echo $titre_panel; ?>
      </p>

      <form role="form" method="post" class="form-horizontal" name="ajout_modif">



        <div class="columns">

          <!-- inputs cachés -->
          <input type="hidden" name="membreid" value="<?php echo $membreid; ?>">
          <?php
          if (isset($itemid)) {
            echo '<input type="hidden" name="element" value="' . $itemid . '">';
          }
          ?>

          <!---COLONNE DE GAUCHE -->
          <div class="column is-half">

            <div class="field">
              <label class="label  has-text-white">Date</label>
              <div class="control">
                <input class="input" type="date" value="<?php echo $element['date']; ?>" name="date" required>
              </div>
            </div>

            <div class="field">
              <label class="label has-text-white">Lieu</label>
              <div class="control">
                <input class="input" type="text" list="lieu" required data-parsley-length="[2, 12]" value="<?php echo $element['lieu']; ?>" name="lieu" id="lieu" required>
              </div>
            </div>

            <div class="field">
              <label class="label has-text-white">Nombre</label>
              <div class="control">
                <input class="input" type="number" min="1" max="700" value="<?php echo $element['nb']; ?>" name="nb" required>
              </div>
            </div>

            <div class="field">
              <label class="label has-text-white">Solo/Biplace</label>
              <input class="is-checkradio is-white" id="BS_biplace" type="radio" name="BS" <?php if ($element['BS'] == 1) {
                                                                                              echo "checked";
                                                                                            } ?>>
              <label for="BS_biplace" class="has-text-white"><img src="img/tandem_blanc.png" style="height:20px" /> Biplace</label>

              <input class="is-checkradio is-white" id="BS_solo" type="radio" name="BS" <?php if ($element['BS'] == 0) {
                                                                                          echo "checked";
                                                                                        } ?>>
              <label for="BS_solo" class="has-text-white"><img src="img/solo_blanc.png" style="height:20px;" /> Solo</label>
            </div>

          </div>
          <!-- FIN COLONNE DE GAUCHE -->


          <!---COLONNE DE DROITE -->

          <div class="column is-half">

            <div class="field">
              <label class="label has-text-white">Hauteur</label>
              <div class="control">
                <input class="input" type="number" min="1" max="30000" value="<?php echo $element['hauteur'] ?>" name="hauteur" id="hauteur" required>
              </div>
            </div>

            <div class="field">
              <label class="label has-text-white">Immat Aéronef</label>
              <div class="control">
                <input type="text" class="input" list="immat" name="immat" data-parsley-length="[2, 6]" value="<?php echo $element['immat']; ?>" id="immat" required>
              </div>
            </div>

            <div class="field">
              <label class="label has-text-white">Parachute</label>
              <div class="control">
                <input list="parachute" class="input" type="text" name="principale" data-parsley-length="[4, 12]" value="<?php echo $element['principale']; ?>" id="principale" required>
              </div>
            </div>


            <div class="field">
              <label class="label has-text-white">Travail/Ent.</label>
              <input class="is-checkradio is-white" id="TE_travail" type="radio" name="TE" <?php if ($element['TE'] == 1) {
                                                                                              echo "checked";
                                                                                            } ?>>
              <label for="TE_travail" class="has-text-white"><i class="fa fa-briefcase has-text-white"></i> Travail</label>

              <input class="is-checkradio is-white" id="TE_entrainement" type="radio" name="TE" <?php if ($element['TE'] == 0) {
                                                                                                  echo "checked";
                                                                                                } ?>>
              <label for="TE_entrainement" class="has-text-white"><i class="fas fa-smile has-text-white"></i> Entrainement</label>
            </div>



          </div>

        </div>




        <div class="columns">
          <div class="column is-full">
            <a class="button" id="CollapseSpecialButton">Options de saut spéciales</a>

            <div id="collapseSpecial" style="display:none;">
              <div class="box">

                <div class="field">
                  <label class="label">Commandé / Automatique</label>
                  <div class="control">

                    <label class="radio">
                      <input type="radio" name="CA" value="1" <?php if ($element['CA'] == 1) {
                                                                echo "checked";
                                                              } ?> id="CA_automatique">
                      Commandé
                    </label>
                    <label class="radio">
                      <input type="radio" name="CA" value="0" <?php if ($element['CA'] == 0) {
                                                                echo "checked";
                                                              } ?> id="CA_commandé">
                      Automatique
                    </label>

                  </div>
                </div>


                <div class="field">
                  <label class="label">Rôle</label>

                  <div class="control">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="radio">
                        <input type="radio" name="fct" value="1" <?php if ($element['fct'] == 1) {
                                                                    echo "checked";
                                                                  } ?> id="fct_parachutiste">
                        Parachutiste
                      </label>
                      <label class="radio">
                        <input type="radio" name="fct" value="2" <?php if ($element['fct'] == 2) {
                                                                    echo "checked";
                                                                  } ?> id="fct_eleve">
                        Elève
                      </label>
                      <label class="radio">
                        <input type="radio" name="fct" value="3" <?php if ($element['fct'] == 3) {
                                                                    echo "checked";
                                                                  } ?> id="fct_largueur">
                        Largueur
                      </label>
                      <label class="radio">
                        <input type="radio" name="fct" value="4" <?php if ($element['fct'] == 4) {
                                                                    echo "checked";
                                                                  } ?> id="fct_instructeur">
                        Instructeur
                      </label>
                    </div>
                  </div>

                </div>

                <div class="field">
                  <label class="label">Type spécial</label>

                  <div class="control">
                    <div class="btn-group" data-toggle="buttons">
                      <label class="checkbox">
                        <input type="checkbox" name="M" value="1" <?php if ($element['M']) {
                                                                    echo "checked";
                                                                  } ?> id="M"></input>
                        Manifestation
                      </label>
                      <br>
                      <label class="checkbox">
                        <input type="checkbox" name="N" value="1" id="N" <?php if ($element['N']) {
                                                                            echo "checked";
                                                                          } ?>></input>
                        Nuit
                      </label>
                      <br>
                      <label class="checkbox">
                        <input type="checkbox" name="L" value="1" id="L" <?php if ($element['L']) {
                                                                            echo "checked";
                                                                          } ?>></input>
                        Largage
                      </label>
                      <br>
                      <label class="checkbox">
                        <input type="checkbox" name="C" value="1" id="C" <?php if ($element['C']) {
                                                                            echo "checked";
                                                                          } ?>></input>
                        Compétition
                      </label>
                      <br>
                      <label class="checkbox">
                        <input type="checkbox" name="W" value="1" id="W" <?php if ($element['W']) {
                                                                            echo "checked";
                                                                          } ?>></input>
                        Wingsuit
                      </label>
                    </div>
                  </div>
                </div>


                <div class="field">
                  <label class="label">Temps de vol</label>
                  <div class="control">
                    <input class="input" type="number" min="1" max="600" name='tpsvol' class='form-control' value="20" value="<?php echo $element['tpsvol']; ?>" id="tpsvol" required>
                  </div>
                </div>

                <div class="field">
                  <label class="label">Commentaire</label>
                  <div class="control">
                    <textarea class="input" rows="3" name="com"><?php echo $element['com']; ?></textarea>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button class="button is-large is-success">+ AJOUTER</button>
          </div>

        </div>
      </form>


    </div>

  </div>
</div>


<script>
  $('#CollapseSpecialButton').click(function() {
    if ($('#collapseSpecial').css('display') == "none") {
      $('#collapseSpecial').fadeIn();
    } else {
      $('#collapseSpecial').fadeOut();
    }
  });
</script>