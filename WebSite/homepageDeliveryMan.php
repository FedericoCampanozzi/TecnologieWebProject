<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>Homepage Fattorino</title>
  <link href="css/reset.css" type="text/css">
  <link href="css/style2.css" type="text/css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!-- cdn for modernizr, if you haven't included it already -->
  <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
  <!-- polyfiller file to detect and load polyfills -->
  <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
  <main>
    <div>
      <div class="row py-5">
        <div class="col-lg-10 mx-auto">
          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
              <div class="table-responsive">
                <table id="tbl_ruoli_utente" style="width:100%" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Id Ordine</th>
                      <th>Nome</th>
                      <th>Cognome</th>
                      <th>Contanti</th>
                      <th>Via</th>
                      <th>NC</th>
                      <th>Citta</th>
                      <th>Note</th>
                      <th><th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    require_once("utils/database.php");
                    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
                    $consegne  = $dbh->get_open_ordini();
                    for ($i = 0; $i < sizeof($consegne); $i++) {
                      $contanti = "";
                      if($consegne[$i]["SceltaContatni"]==1) $contanti = "checked";
                      echo "<tr>
                        <td>".$consegne[$i]["ID"]."</td>
                        <td>".$consegne[$i]["Nome"]."</td>
                        <td>".$consegne[$i]["Cognome"]."</td>
                        <td><input class=\"form-check-input\" type=\"checkbox\" value=\"\" ".$contanti."></td>
                        <td>".$consegne[$i]["Via"]."</td>
                        <td>".$consegne[$i]["NumeroCivico"]."</td>
                        <td>".$consegne[$i]["Citta"]."</td>
                        <td>".$consegne[$i]["Note"]."</td>
                        <td> 
                          <form action=\"utils/update.php\" method=\"get\">
                            <input type=\"text\" name=\"obj_to_update\" class=\"hidden-field\" value=\"ordine\">
                            <input type=\"text\" name=\"id_fattorino\" class=\"hidden-field\" value=\"".$_SESSION["IdUtente"]."\">
                            <input type=\"text\" name=\"id_ordine\" class=\"hidden-field\" value=\"".$consegne[$i]["ID"]."\">
                            <button type=\"submit\" class=\"btn btn-primary\">chiudi</button>
                          </form> 
                        <td>
                      </tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>