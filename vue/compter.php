
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


            <form action="compt.php" method="post" class="form-horizontal">

              <div class="form-group">

                <label for="date1" class="col-xs-2 control-label">Date entre &nbsp;</label>
                <div class="form-group col-sm-3">
                  <input type="date" name="dated" id="date1" class="form-control" value="<?php echo $dated; ?>"/>
                </div>
                <label class="col-xs-1 control-label">
                  et
                </label>
                <div  class="form-group col-sm-3">
                  <input type="date" name="datef"  class="form-control" value="<?php echo $datef; ?>"/>
                </div>

              </div>





              <div class="form-group">
                <label for="Lieu"  class="col-sm-2 control-label">Lieu :</label>

                <div class="col-sm-4">
                  <select name="lieu" class="form-control">
                    <option value="" selected></option>
                    <?php 	echo selectelemt("lieu", $membreid, $DB_con);	?>
                  </select>
                </div>
                <div class="col-sm-6 text-nowrap"></div>
              </div>


              <div class="form-group">
                <label for="afimmat"  class="col-sm-2 control-label">Immat :</label>

                <div class="col-sm-4">
                  <select name="afimmat" class="form-control">
                    <option value="" selected></option>
                    <?php 	echo selectelemt("afimmat", $membreid, $DB_con);	?>
                  </select>
                </div>
                <div class="col-sm-6 text-nowrap"></div>
              </div>





              <div class="form-group">
                <label for="aftype"  class="col-sm-2 control-label">type aéronef :</label>

                <div class="col-sm-4">
                  <select name="aftype" class="form-control">
                    <option value="" selected></option>
                    <?php 	echo selectelemt("aftype", $membreid, $DB_con);	?>
                  </select>
                </div>
                <div class="col-sm-6 text-nowrap"></div>
              </div>

              <div class="form-group">
                <label for="principale"  class="col-sm-2 control-label">principale :</label>


                <div class="col-sm-4">
                  <select name="principale" class="form-control">
                    <option value="" selected ></option>
                    <?php 	echo selectelemt("principale", $membreid, $DB_con);	?>
                  </select>
                </div>
                <div class="col-sm-6"></div>
              </div>



              <div class="form-group">
                <label for="hauteur"  class="col-sm-2 control-label">hauteur :</label>


                <div class="col-sm-1">

                  <select name="operateur" class="form-control">
                    <option value=""></option>
                    <option value="=">=</option>
                    <option value="<"><</option>
                    <option value=">">></option>
                  </select>
                </div>

                <div class="col-sm-2">
                  <input type="text" size="5" name="hauteur" class="form-control"></input>
                </div>

                <div class="col-sm-6 text-nowrap"></div>

              </div>

              <div class="form-group">
                <label for="bisolo"  class="col-md-2 control-label">Bi/Solo:</label>


                <div class="col-sm-4">

                  <select name="bisolo" class="form-control">
                    <option value=""></option>
                    <option value="1">Bi</option>
                    <option value="0">Solo</option>

                  </select>


                </div>
                <div class="col-sm-6"></div>

              </div>

              <div class="form-group">
                <label for="te"  class="col-md-2 control-label">Travail/Entr. :</label>


                <div class="col-sm-4">

                  <select name="te" class="form-control">
                    <option value="" selected></option>
                    <option value="1">Travail</option>
                    <option value="0">Entr.</option>

                  </select>


                </div>
                <div class="col-sm-6"></div>

              </div>


              <div class="form-group">
                <label for="spe"  class="col-sm-2 control-label">spécial:</label>


                <div class="col-sm-4">

                  <select name="spe" class="form-control">
                    <option value="" selected></option>
                    <option value="1">Manifestation</option>
                    <option value="2">Nuit</option>
                    <option value="3">Largage</option>
                    <option value="4">Wingsuit</option>

                  </select>


                </div>
                <div class="col-sm-6"></div>

              </div>

              <div class="form-group">
                <label for="video"  class="col-sm-2 control-label">Vidéo/Photo:</label>


                <div class="col-sm-4">

                  <select name="video" class="form-control">
                    <option value=""></option>
                    <option value="1">Vidéo</option>
                    <option value="3">Photo</option>
                    <option value="1,3">Vidéo/Photo</option>"
                  </select>

              </div>
              <input class="btn btn-primary" type="submit"value="Compter"></button>
            </form>




        </div>
      </div>
    </div>

  </div>

</div>
