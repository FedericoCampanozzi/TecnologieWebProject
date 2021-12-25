<!doctype html>
<html lang="it">

<head>
    <title>Homepage Ammistratore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
        require_once("utils/database.php");
        $dbh = new DatabaseHelper("localhost", "root", "", "plant");
    ?>
    <!-- Modal -->
    <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="lbl_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lbl_modal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                        session_start(); 
                        echo $_SESSION["msg"];
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
                                    session_start();
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
    <div style="background-color: red;">
        <form action="utils/insert.php" method="get">
            <input type="text" name="obj_to_insert" class="hidden-field" value="fornitore">
            <div class="form-group">
                <label for="p_iva">Partita IVA (16 caratteri) : </label>
                <input type="text" class="form-control" name="p_iva" id="p_iva" placeholder="Partita IVA">
            </div>
            <div class="form-group">
                <label for="ragione_sociale">Ragione Sociale : </label>
                <input type="text" class="form-control" name="ragione_sociale" id="ragione_sociale" placeholder="Ragione Sociale">
            </div>
            <div class="form-group">
                <label for="via">Via : </label>
                <input type="text" class="form-control" name="via" id="via" placeholder="Via">
            </div>
            <div class="form-group">
                <label for="numero_civico">Numero Civico : </label>
                <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
            </div>
            <div class="form-group">
                <label for="citta">Citt&agrave; : </label>
                <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
            </div>
            <button type="submit" class="btn btn-primary">Aggiungi</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <script>
        $(function() {
            $(document).ready(function() {
                $('#tbl_ruoli_utente').DataTable();
                <?php 
                    if($_SESSION["last_page"] == "insert.php")
                    echo "$('#my_modal').modal('show')";
                ?>
            });
        });
    </script>
</body>

</html>