
<div id="page-wrapper">
  <!-- /.row -->
  <div class="row">

    <div class="col-sm-12">
      <div class="panel panel-green">
        <div class="panel-heading">
          <i class="fa fa-percent fa-fw"></i> Compter les sauts
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">


          <form action="zelogsv3.php?page=compter" method="post" class="form-horizontal">

            <div class="form-group">

              <label for="date1" class="col-xs-2 control-label">Date entre &nbsp;</label>
              <div class="col-sm-3">
                <div class="input-group">
                  <input type="date" name="dated" id="date1" class="form-control" value="<?php echo $dated; ?>" required/>
                  <div class="input-group-addon"><i class="fa fa-arrow-right"></i></div>
                </div>
              </div>

              <div class="col-sm-3">
                <input type="date" name="datef"  class="form-control" value="<?php echo $datef; ?>" required />
              </div>
            </div>

            <div class="form-group">
              <label for="Lieu"  class="col-xs-2 control-label">Lieu :</label>
              <div class="col-sm-6">
                <select name="lieu" class="form-control">
                  <option value="" <?php if(!isset($lieu)){echo "selected";} ?>></option>
                  <?php
                    if(isset($options_lieux))
                    {
                      foreach($options_lieux as $option)
                      {
                        echo "<option value=\"".$option['lieu']."\"";
                        if(isset($lieu) && $lieu==$option['lieu']){echo "selected";}
                        echo ">".$option['lieu'];
                        echo "  ".$option['total']." sauts";
                        echo "</option>";
                      }
                    }
                   ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label for="afimmat"  class="col-sm-2 control-label">Immat :</label>

              <div class="col-sm-4">
                <select name="immat" class="form-control">
                  <option value="" <?php if(!isset($immat)){echo "selected";} ?>></option>
                  <?php
                    if(isset($options_immat))
                    {
                      foreach($options_immat as $option)
                      {
                        echo "<option value=\"".$option['immat']."\"";
                        if(isset($immat) && $immat==$option['immat']){echo "selected";}
                        echo ">".$option['immat'];
                        echo "  ".$option['total']." sauts";
                        echo "</option>";
                      }
                    }
                   ?>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label for="principale"  class="col-sm-2 control-label">principale :</label>
              <div class="col-sm-4">
                <select name="principale" class="form-control">
                  <option value="" <?php if(!isset($principale)){echo "selected";} ?> ></option>
                  <?php
                    if(isset($options_principale))
                    {
                      foreach($options_principale as $option)
                      {
                        echo "<option value=\"".$option['principale']."\"";
                        if(isset($principale) && $principale==$option['principale']){echo "selected";}
                        echo ">".$option['principale'];
                        echo "  ".$option['total']." sauts";
                        echo "</option>";
                      }
                    }
                   ?>
                </select>
              </div>
            </div>



            <div class="form-group">
              <label for="hauteur"  class="col-sm-2 control-label">hauteur :</label>
              <div class="col-sm-1">

                <select name="signe" class="form-control">
                  <option value=""></option>
                  <option value="=" <?php if(isset($signe) && $signe=="="){echo "selected";} ?>>=</option>
                  <option value="<" <?php if(isset($signe) && $signe=="<"){echo "selected";} ?>><</option>
                  <option value=">" <?php if(isset($signe) && $signe==">"){echo "selected";} ?>>></option>
                </select>
              </div>

              <div class="col-sm-2">
                <input type="text" name="hauteur" class="form-control" <?php if(isset($hauteur)){echo "value=\"".$hauteur."\"";} ?>></input>
              </div>
            </div>


            <div class="form-group">
              <label for="bisolo"  class="col-md-2 control-label">Bi/Solo:</label>

              <div class="col-sm-4">
                <select name="bisolo" class="form-control">
                  <option value=""></option>
                  <option value="1" <?php if(isset($bisolo) && $bisolo=="1"){echo "selected";} ?>>Bi</option>
                  <option value="0" <?php if(isset($bisolo) && $bisolo=="0"){echo "selected";} ?>>Solo</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label for="travailent"  class="col-md-2 control-label">Travail/Entr. :</label>
              <div class="col-sm-4">
                <select name="travailent" class="form-control">
                  <option value="" selected></option>
                  <option value="1" <?php if(isset($travailent) && $travailent=="1"){echo "selected";} ?>>Travail</option>
                  <option value="0" <?php if(isset($travailent) && $travailent=="0"){echo "selected";} ?>>Entr.</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <label for="spe"  class="col-sm-2 control-label">spécial:</label>
              <div class="col-sm-4">
                <select name="special" class="form-control">
                  <option value="" selected></option>
                  <option value="1" <?php if(isset($special) && $special=="1"){echo "selected";} ?>>Manifestation</option>
                  <option value="2" <?php if(isset($special) && $special=="2"){echo "selected";} ?>>Nuit</option>
                  <option value="3" <?php if(isset($special) && $special=="3"){echo "selected";} ?>>Largage</option>
                  <option value="4" <?php if(isset($special) && $special=="4"){echo "selected";} ?>>Wingsuit</option>
                </select>
              </div>
            </div>
              <input class="btn btn-primary" type="submit"value="Compter"></button>
            </form>

            <h1>résultat : <?php echo $resultat ?></h1>
          </div>
        </div>
      </div>

    </div>
<!-- fin premier panel -->

  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <i class="fa fa-calendar fa-fw"></i> Rappels
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
        </div>
      </div>
    </div>
  </div>


  </div>
