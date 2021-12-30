<!doctype html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Pagina Amministratore", "homepageAdmin.php", true, true);
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
        <?php $hh->generate_header("Pannello Amministrazione"); ?>
            <div style="height: 750px; overflow-y:scroll;" id="main-section">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <table id="tbl_ruoli_utente" style="width:100%" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Ruolo</th>
                                        <th>Azienda P. IVA</th>
                                        <th>Make Admin</th>
                                        <th></th>
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
                                        echo " </select>     </div>
                                            </div>
                                            </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> Aggiorna </td>
                                            </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <table id="tbl_fornitori" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Descrizione</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        <?php $hh->generate_footer(); ?>
    </main>
    <script>
        $(document).ready(
            function(){                
                //let _header = document.getElementsByTagName("header"); 
                //let _footer = document.getElementsByTagName("footer");
                //let _main = document.getElementById("main-section");
                //_main.style.height = "50px";
                //alert(_header.style);
            }
        );
    </script>
</body>

</html>