
<div class="row">
  <div class="container">
    <div class="col-md-12">
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

              foreach($liste_membres as $ligne)
              {

                echo "<tr class=\"odd gradeX\">";
                echo "<td>{$ligne['id']}</td>";
                echo "<td>{$ligne['login']}</td>";
                echo "<td>{$ligne['mail']}</td>";
                echo "<td>".$carnet->compte_sauts($ligne['id'],0,0,0)."</td>";
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
                <th>remplacer par</th>
                <th>time</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach($liste_af as $ligne)
              {

                if($aeronef->af_present($ligne['immat']))
                {$type=$aeronef->type($ligne['immat']);}else{$type="Inconnu";}

                echo "<tr class=\"odd gradeX\">";
                echo "<td>{$ligne['immat']}</td>";
                echo "<td>{$ligne['nb']}</td>";
                echo "<td>{$type}</td>";
                echo "<td></td>";
                echo "<td></td>";
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
