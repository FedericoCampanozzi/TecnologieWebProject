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
            const id_parts = $(this).attr("id").split("_");
            $.post("utils/update.php", {
                obj_to_update: "usr_ruolo",
                IdUtenteCambio: document.getElementById("IdUtente_" + id_parts[1]).value,
                IdNuovoRuolo: 3,
                P_IVA : null
            }, function(response) {
                console.log("Response: " + response);
                location.reload();
            });
        });
        
        $(".change_ruolo").click(function() {
            const id_parts = $(this).attr("id").split("_");
            const new_idr = parseInt(document.getElementById("ruolo_" + id_parts[1]).value);
            let piva = null;
            wwwwwwwwwwww
            $.post('utils/update.php', {
                obj_to_update: "usr_ruolo",
                IdUtenteCambio: document.getElementById("IdUtente_" + id_parts[1]).value,
                IdNuovoRuolo: new_idr,
                P_IVA: piva
            }, function(response) {
                console.log("Response: " + response);
                location.reload();
            });
        });
    });
</script>

<body>
    <main>
        <?php $hh->generate_header("Pannello Amministrazione"); ?>
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
                                        if (isset($all_az[$j]["PIVA"]) && $users[$i]["PIVA"] == $all_az[$j]["PIVA"])
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
                                                        <input type=\"hidden\" id=\"IdUtente_" . $i . "\" value=\"".$users[$i]["ID"]."\">
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