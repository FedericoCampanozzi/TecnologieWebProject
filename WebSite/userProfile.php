<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Profilo Utente</title>
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
    <?php
    require_once("utils/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
    ?>
    <main>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dati Personali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Carrello</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Carte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Recapiti</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <section>
                    <h1>Dati Personali</h1>
                </section>
                <form action="utils/update.php" method="get">
                    <input type="text" name="obj_to_insert" style="display: none;" value="fornitore">
                    <div class="form-group">
                        <label for="p_iva">Username : </label>
                        <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="p_iva">Email : </label>
                        <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="p_iva">Telefono : </label>
                        <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Telefono">
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiorna</button>
                </form>
                Clicca <a href="recuperaAccount.php">qui</a> per recuperare la password
            </div>
            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <section>
                    <h1>
                        Carrello
                    </h1>
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
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="pagamento.php" method="get">
                        <button type="submit" class="btn btn-primary">Procedi all'ordine</button>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                <section>
                    <h1>
                        Carte
                    </h1>
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
                </section>
            </div>
            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <section>
                    <h1>
                        Recapiti
                    </h1>
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
                </section>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    </main>
</body>

</html>