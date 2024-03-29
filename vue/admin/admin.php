<div class="row">
  <div class="container">
    <div class="col-md-12">
      <a class='btn btn-primary btn-sm' href='zelogsv3.php?page=accueil'>retour</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          Membres
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">

          <table width="100%" class="table table-striped table-bordered table-hover" id="datatables">
            <thead>
              <tr>
                <th>id</th>
                <th>Login</th>
                <th>mail</th>
                <th>sauts</th>
                <th>time</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach ($liste_membres as $ligne) {

                echo "<tr class=\"odd gradeX\">";
                echo "<td>{$ligne['id']}</td>";
                echo "<td>{$ligne['login']}</td>";
                echo "<td>{$ligne['mail']}</td>";
                echo "<td>" . $carnet->compte_sauts($ligne['id'], 0, 0, 0) . "</td>";
                echo "<td>{$ligne['timestamp']}</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          aéronefs
        </div>

        <!-- /.panel-heading -->
        <div class="panel-body">

          <table width="100%" class="table table-striped table-bordered table-hover" id="datatables2">
            <thead>
              <tr>
                <th>immat</th>
                <th>nb</th>
                <th>type</th>
                <th>remplacer immat</th>
                <th>remplacer type</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach ($liste_af as $ligne) {
                
                $infos_af = $aeronef->get_immat($ligne['immat']);
                if (!empty($infos_af)) {
                  $type = $aeronef->type($ligne['immat']);
                } else {
                  $type = "?";
                }

                echo "<tr class=\"odd gradeX\">";
                echo "<td>{$ligne['immat']}";
                echo " <a href='http://www.airport-data.com/aircraft/" . $ligne['immat'] . ".html' target='_blank'><i class='fa fa-search'></i></a>";
                if ($type == "?" && $ligne['immat'] != "") {
                  echo "<a href='zelogsv3.php?page=admin&action=addaf&immat=" . $ligne['immat'] . "' class='pull-right'>+</a>";
                }
                echo "</td>";
                echo "<td>{$ligne['tot']}</td>";
                echo "<td>{$type}</td>";
                echo "<td>";
                if ($type == "?" && $ligne['immat'] != "") {
                  echo "<form action='zelogsv3.php' method='get'>";
                  echo "<input type='hidden' name='page' value='admin'/>";
                  echo "<input type='hidden' name='immat' value='" . $ligne['immat'] . "'/>";
                  echo "<input type='text' size='8' maxlength='8' name='newimmat'/>";
                  echo "<button class='btn btn-success btn-sm' value='submit' >go</button>";
                  echo "</form>";
                }
                echo "</td>";
                echo "<td>";
                if ($type != "?") {
                  echo "<form action='zelogsv3.php' method='get'>";
                  echo "<input type='hidden' name='page' value='admin'/>";
                  echo "<input type='hidden' name='immat' value='" . $ligne['immat'] . "'/>";
                  echo "<input type='text' size='8' maxlength='8' name='newtype'/>";
                  echo "<button class='btn btn-success btn-sm' type='submit'>go</button>";
                  echo "</form>";
                }
                echo "</td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>