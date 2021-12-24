<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8">
  <title>Recupera Password</title>
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
                      <th>Username</th>
                      <th>Password</th>
                      <th>Ruolo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    //session_start();
                    require_once("utils/database.php");
                    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
                    $users = $dbh->get_users();
                    $all_role = $dbh->get_role();
                    for ($i = 0; $i < sizeof($users); $i++) {
                      echo "<tr>
                                                <td>" . $users[$i]["Username"] . "</td>
                                                <td><button type=\"submit\" class=\"btn btn-primary\">Reset</button></td>
                                                <td><div class=\"dropdown show max-input-size\">
                                                <a class=\"btn btn-secondary dropdown-toggle max-input-size\" href=\"#\" role=\"button\" id=\"ruolo_utente" . $i . "\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Ruoli</a>
                                                <div class=\"dropdown-menu\" aria-labelledby=\"ruolo_utente" . $i . "\">";
                      for ($j = 0; $j < sizeof($all_role); $j++) {
                        if ($j == 0) {
                          echo "<a class=\"dropdown-item selected max-input-size\" href=\"#\">" . $all_role[$j]["Descrizione"] . "</a>";
                          continue;
                        }
                        echo "<a class=\"dropdown-item\" href=\"#\">" . $all_role[$j]["Descrizione"] . "</a>";
                      }
                      echo "</div></div></td></tr>";
                    }
                    ?>
                    <form action="utils/insert.php" method="get">
                      <tr>
                        <input type="text" name="obj_to_insert" style="display: none;" value="recapito">
                        <td>
                          <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                        </td>
                        <td>
                          <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
                        </td>
                        <td>
                          <button type="submit" class="btn btn-primary">Aggiungi</button>
                        </td>
                      </tr>
                    </form>
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