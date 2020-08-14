<div class="container">
  <div class="section">

    <div class="panel is-success">
      <div class="panel-heading">
        <i class="fa fa-percent fa-fw"></i> Compter les sauts
      </div>
      <!-- /.panel-heading -->
      <div class="panel-block">


        <form action="zelogsv3.php?page=compter" method="post" style="width:100%">

          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label">Date entre</label>
            </div>

            <div class="field-body">

              <div class="field">
                <div class="control">
                  <input type="date" name="dated" id="date1" class="input" value="<?php echo $dated; ?>" required />
                </div>
              </div>


              <label class="label" style="margin:8px;margin-left:0px;"><i class="fa fa-arrow-right"></i></label>


              <div class="field">
                <div class="control">
                  <input type="date" name="datef" class="input" value="<?php echo $datef; ?>" required />
                </div>
              </div>

            </div>
          </div>

          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label">Lieu :</label>
            </div>

            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="lieu" class="input">
                    <option value="" <?php if (!isset($lieu)) {
                                        echo "selected";
                                      } ?>></option>
                    <?php
                    if (isset($options_lieux)) {
                      foreach ($options_lieux as $option) {
                        echo "<option value=\"" . $option['lieu'] . "\"";
                        if (isset($lieu) && $lieu == $option['lieu']) {
                          echo "selected";
                        }
                        echo ">" . $option['lieu'];
                        echo "  " . $option['total'] . " sauts";
                        echo "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label">Immat :</label>
            </div>

            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="immat" class="input">
                    <option value="" <?php if (!isset($immat)) {
                                        echo "selected";
                                      } ?>></option>
                    <?php
                    if (isset($options_immat)) {
                      foreach ($options_immat as $option) {
                        echo "<option value=\"" . $option['immat'] . "\"";
                        if (isset($immat) && $immat == $option['immat']) {
                          echo "selected";
                        }
                        echo ">" . $option['immat'];
                        echo "  " . $option['total'] . " sauts";
                        echo "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>



          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="principale">principale :</label>
            </div>


            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="principale" class="input">
                    <option value="" <?php if (!isset($principale)) {
                                        echo "selected";
                                      } ?>></option>
                    <?php
                    if (isset($options_principale)) {
                      foreach ($options_principale as $option) {
                        echo "<option value=\"" . $option['principale'] . "\"";
                        if (isset($principale) && $principale == $option['principale']) {
                          echo "selected";
                        }
                        echo ">" . $option['principale'];
                        echo "  " . $option['total'] . " sauts";
                        echo "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          </div>




          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="hauteur">hauteur :</label>
            </div>




            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="signe" class="input">
                    <option value=""></option>
                    <option value="=" <?php if (isset($signe) && $signe == "=") {
                                        echo "selected";
                                      } ?>>=</option>
                    <option value="<" <?php if (isset($signe) && $signe == "<") {
                                        echo "selected";
                                      } ?>>
                      <</option> <option value=">" <?php if (isset($signe) && $signe == ">") {
                                                      echo "selected";
                                                    } ?>>>
                    </option>
                  </select>
                </div>
              </div>

              <div class="field">
                <input type="text" name="hauteur" class="input" <?php if (isset($hauteur)) {
                                                                  echo "value=\"" . $hauteur . "\"";
                                                                } ?>></input>
              </div>
            </div>
          </div>



          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="bisolo">Bi/Solo:</label>
            </div>



            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="bisolo" class="input">
                    <option value=""></option>
                    <option value="1" <?php if (isset($bisolo) && $bisolo == "1") {
                                        echo "selected";
                                      } ?>>Bi</option>
                    <option value="0" <?php if (isset($bisolo) && $bisolo == "0") {
                                        echo "selected";
                                      } ?>>Solo</option>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="travailent">Travail/Entr. :</label>
            </div>


            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="travailent" class="input">
                    <option value="" selected></option>
                    <option value="1" <?php if (isset($travailent) && $travailent == "1") {
                                        echo "selected";
                                      } ?>>Travail</option>
                    <option value="0" <?php if (isset($travailent) && $travailent == "0") {
                                        echo "selected";
                                      } ?>>Entr.</option>
                  </select>
                </div>
              </div>
            </div>
          </div>


          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="spe" class="col-sm-2 control-label">spécial:</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <select name="special" class="input">
                    <option value="" selected></option>
                    <option value="1" <?php if (isset($special) && $special == "1") {
                                        echo "selected";
                                      } ?>>Manifestation</option>
                    <option value="2" <?php if (isset($special) && $special == "2") {
                                        echo "selected";
                                      } ?>>Nuit</option>
                    <option value="3" <?php if (isset($special) && $special == "3") {
                                        echo "selected";
                                      } ?>>Largage</option>
                    <option value="4" <?php if (isset($special) && $special == "4") {
                                        echo "selected";
                                      } ?>>Wingsuit</option>
                  </select>
                </div>
              </div>
            </div>
          </div>



          <div class="field is-horizontal">

            <div class="field-label is-normal">
              <label class="label" for="spe" class="col-sm-2 control-label">Résultat :</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                <button class="button is-primary" type="submit">Compter</button>
                
                </div>
              </div>
              <div class="field">
                <div class="control">
                <button class="button is-large is-fullwidth" disabled>Total : <?php echo $resultat ?></button>
                </div>
              </div>
            </div>
          </div>

        
        </form>

        
      </div>
    </div>
  </div>

</div>