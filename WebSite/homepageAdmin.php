<!doctype html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_header("Pagina Amministratore", "homepageAdmin.php", true, true);
?>
<script>
    $(document).ready(function() {
        $('#tbl_ruoli_utente').DataTable();
        $('#tbl_fornitori').DataTable();
        $('#tbl_ordini').DataTable();
    });
</script>

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
                                            <th>Ruolo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once("utils/database.php");
                                        $dbh = new DatabaseHelper("localhost", "root", "", "plant");
                                        $users = $dbh->get_users();
                                        $all_role = $dbh->get_role();
                                        for ($i = 0; $i < sizeof($users); $i++) {
                                            echo "
                                            <tr>
                                                <td>" . $users[$i]["Username"] . "</td>
                                                <td>
                                                <select class=\"form-control\" id=\"ruolo\" name=\"ruolo\">";
                                                    for ($j = 0; $j < sizeof($all_role); $j++) {
                                                        echo "<option value=" . $all_role[$j]["ID"] . ">" . $all_role[$j]["Nome"] . "</option>";
                                                    }
                                                    echo "      </div>
                                                </div>
                                                </td>
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
        <div>
            <div class="row py-5">
                <div class="col-lg-10 mx-auto">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="tbl_fornitori" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>RagioneSociale</th>
                                            <th>NumeroProdottiAttivi</th>
                                            <th>Forniture</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                <table id="tbl_ordini" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>RagioneSociale</th>
                                            <th>NumeroProdottiAttivi</th>
                                            <th>Forniture</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
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
    </main>
</body>

</html>