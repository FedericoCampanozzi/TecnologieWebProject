<!doctype html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
require_once("utils/database.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Pagina Amministratore", "homepageAdmin.php", true, true);
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
?>
<script>
    $(document).ready(function() {
        $('#tbl_ruoli_utente').DataTable();
        $('#tbl_fornitori').DataTable();
        $('#tbl_ordini').DataTable();
        $(".changeInAdmin").click(function() {
            $('#modalWarningAdmin').modal('show');
        });
        $("#change_admin").click(function() {
            const id_parts = $(this).id.split(" ");
            const row = parseInt(id_parts[1]);
            $.post("utils/update.php", {
                obj_to_update: "usr_admin",
                IdUtenteCambio: $("IdUtente_" + row).val()
            });
        });
        $(".change_ruolo").click(function() {
            const id_parts = $(this).id.split(" ");
            const row = parseInt(id_parts[1]);
            const piva = null;
            if ($("#ruolo_" + row) == 3) {
                piva = $("forn_" + row).val();
            }
            $.post("utils/update.php", {
                obj_to_update: "usr_ruolo",
                IdUtenteCambio: $("IdUtente_" + row).val(),
                IdNuovoRuolo: $("ruolo_" + row).val(),
                P_IVA: piva

            });
        });
    });
</script>

<body>
    <main>
        <?php $hh->generate_header("Pannello Amministrazione"); ?>
        <div class="modal fade" id="modalWarningAdmin" tabindex="-1" role="dialog" aria-labelledby="generalModal" aria-hidden="true">
            <div class="modal-dialog modal-msg-warning" role="document">
                <div class="modal-content modal-msg-warning"></div>
                <div class="modal-header modal-msg-warning">
                    <h5 class="modal-title" id="generalModal">Messaggio Importante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-msg-warning">
                    Sicuro di voler cambiare il ruolo di questo utente in Amministratore?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-rounded-2" data-dismiss="modal" id="change_admin">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                        </svg> SI </button>
                    <button type="button" class="btn-rounded-2" data-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                        </svg> NO </button>
                </div>
            </div>
        </div>
        <div class="scrollable-content">
            <div class="card rounded shadow border-0">
                <div class="card-body p-5 bg-white rounded">
                    <div class="table-responsive">
                        <table id="tbl_ruoli_utente" style="width:100%" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Ruolo</th>
                                    <th>Azienda P. IVA</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $users = $dbh->get_users();
                                $all_role = $dbh->get_role();
                                $all_az = $dbh->get_fornitori();
                                for ($i = 0; $i < sizeof($users); $i++) {
                                    echo "
                                            <tr>
                                                <td>" . $users[$i]["Username"] . "</td>
                                                <td>
                                                    <select class=\"form-control\" id=\"ruolo_" . $i . "\">";
                                    for ($j = 0; $j < sizeof($all_role); $j++) {
                                        if ($users[$i]["IdRuolo"] == $all_role[$j]["ID"])
                                            echo "<option value=" . $all_role[$j]["ID"] . " selected>" . $all_role[$j]["Nome"] . "</option>";
                                        else
                                            echo "<option value=" . $all_role[$j]["ID"] . ">" . $all_role[$j]["Nome"] . "</option>";
                                    }
                                    echo "
                                                    </select> 
                                                </td>
                                                <td> <select class=\"form-control\" id=\"forn_" . $i . "\">
                                                     <option value=\"NULL\"> NULL </option>";
                                    for ($j = 0; $j < sizeof($all_az); $j++) {
                                        if (isset($all_az[$j]["PIVA"]) && $users[$i]["PIVA_Fornitore"] == $all_az[$j]["PIVA"])
                                            echo "<option value=" . $all_az[$j]["PIVA"] . " selected>" . $all_az[$j]["RagioneSociale"] . "</option>";
                                        else
                                            echo "<option value=" . $all_az[$j]["PIVA"] . ">" . $all_az[$j]["RagioneSociale"] . "</option>";
                                    }
                                    echo "</td>";

                                    if ($users[$i]["IdRuolo"] != 3) {
                                        echo "
                                                    <td> 
                                                        <button class=\"btn-rounded-2 changeInAdmin\" id=\"admin_" . $i . "\">Supervisore</button> </td>
                                                    </td>";
                                    } else {
                                        echo "<td> </td>";
                                    }
                                    echo "
                                                    <td>
                                                        <input type=\"hidden\" id=\"IdUtente_" . $i . "\">
                                                        <button class=\"btn-rounded-2 change_ruolo\" id=\"cambia_" . $i . "\">Cambia</button> </td>
                                                    </td>
                                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <form action="utils/insert.php" method="get">
                    <input type="hidden" name="obj_to_insert" value="categoria">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="tbl_fornitori" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Descrizione</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $cat = $dbh->get_categoria();
                                    for ($i = 0; $i < sizeof($cat); $i++) {
                                        echo "<tr>
                                                    <td>" . $cat[$i]["Nome"] . "</td>
                                                    <td>" . $cat[$i]["Descrizione"] . "</td>
                                                    <td> </td>
                                                    </tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                                        </td>
                                        <td>
                                            <textarea class="form-control gfx-not-resizable" name="desc" id="desc" placeholder="Descrizione" rows="3"> </textarea>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn-rounded-2">Inserisce</button>
                                        </td>
                                    </tr>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div style="background-color:beige;" class="container">
                <form action="utils/insert.php" method="get">
                    <input type="hidden" name="obj_to_insert" value="fornitore">
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
                    <button type="submit" class="btn-rounded-1">Aggiungi</button>
                </form>
            </div>
            <div class="gfx-link">
                Clicca <a href="logout.php">qui</a> per effettuare il logout
            </div>
        </div>
        <?php $hh->generate_footer(true); ?>
    </main>
</body>

</html>