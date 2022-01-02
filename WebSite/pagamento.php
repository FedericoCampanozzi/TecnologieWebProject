<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/modalMessageHelper.php");
require_once("utils/htmlHelper.php");
require_once("utils/database.php");
$hh = new HTML_Helper();
$hh->generate_page_head(" Pagamento ", "", true);
if (isset($_SESSION["upd"]) && $_SESSION["upd"] && $_SESSION["last_page"] == "pagamento.php" && $_SESSION["msg_type"] == MsgType::Successfull) {
    $_SESSION["upd"] = false;
    echo "<script>location.href='homepageUser.php';</script>";
} else {
    $hh->check_modals("pagamento.php");
}
$idUtente = $_SESSION["IdUtente"];
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
?>

<body>
    <main>
        <?php $hh->generate_header("Pagamento"); ?>
        <div class="scrollable-content">
            <div class="card rounded shadow border-0">
                <div class="card-body p-5 bg-white rounded">
                    <div class="table-responsive">
                        <table id="tbl_riepilogo" style="width:100%;" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Qt.&agrave;</th>
                                    <th>Prezzzo Unitario</th>
                                    <th>Prezzo Totale</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $usr_cart = $dbh->get_carrello($_SESSION["IdUtente"]);
                                $tot = 0;
                                for ($i = 0; $i < sizeof($usr_cart); $i++) {
                                    echo "
                                                        <tr>
                                                            <td><img src=.\images\prodotti\\" . $usr_cart[$i]["ImagePath"] . " width=\"64\" height=\"64\"></td>                                                         </td>
                                                            <td>" . $usr_cart[$i]["Nome"] . "</td>
                                                            <td>" . $usr_cart[$i]["Qta"] . "</td>
                                                            <td>" . $usr_cart[$i]["PrezzoUnitario"] . "  &euro; </td>
                                                            <td>" . $usr_cart[$i]["PrezzoTotale"] . "  &euro; </td>
                                                        </tr> ";
                                    $tot += $usr_cart[$i]["PrezzoTotale"];
                                }/*
                                    echo "
                                            <tr>
                                                <td colspan=\"4\" style=\"font-weight: bold;\"> Totale : </td>
                                                <td style=\"font-weight: bold;\"> " . $tot . " &euro; </td>
                                            </tr>";*/
                                echo "
                                    <tr>
                                        <td style=\"font-weight: bold;\"> Totale : </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td style=\"font-weight: bold;\"> " . $tot . " &euro; </td>
                                    </tr>";
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="container">
                    <form action="utils/insert.php" method="post">
                        <input type="hidden" name="totale" value="<?php echo $tot; ?>">
                        <input type="hidden" value="ordine" name="obj_to_insert" id="obj_to_insert">
                        <label class="form-check-label"> Quale metodo di pagamento vuoi utilizzare ?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="useContanti" id="usaContanti" value="SI" checked>
                            <label class="form-check-label" for="useContanti">Contanti (alla consegna)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="useContanti" id="usaCarte" value="NO">
                            <label class="form-check-label" for="inlineRadio2">Carta</label>
                        </div>
                        <div class="form-group" id="carta_div">
                            <label for="select_carta">Seleziona una carta di pagamento : </label>
                            <select class="form-control" id="select_carta" name="select_carta">
                                <?php
                                $usr_carte = $dbh->get_carte($idUtente);
                                for ($i = 0; $i < sizeof($usr_carte); $i++) {
                                    echo "<option value=" . $usr_carte[$i]["Numero"] . ">" . $usr_carte[$i]["Numero"] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="select_add">Seleziona un indirizzo :</label>
                                    <select class="form-control" id="select_add" name="select_add">
                                        <?php
                                        $usr_add = $dbh->get_recapiti($idUtente);
                                        for ($i = 0; $i < sizeof($usr_add); $i++) {
                                            echo "<option value=" . $usr_add[$i]["ID"] . ">" . $usr_add[$i]["Via"] . "," . $usr_add[$i]["NumeroCivico"] . " - " . $usr_add[$i]["Citta"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <div class="md-form">
                                        <label for="note">Inserire alcune note per il fattorino : </label>
                                        <textarea id="note" name="note" class="md-textarea form-control gfx-not-resizable" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-rounded-1">Acquista</button>
                        <a href="homepageUser.php" class="btn-rounded-1">Annulla</a>
                    </form>
                </div>
            </div>
        </div>
        <?php $hh->generate_footer(true); ?>
    </main>
    <script>
        $(document).ready(function() {
            $("#carta_div").css("visibility", "hidden");
            $("#usaContanti").change(function() {
                $("#carta_div").css("visibility", "hidden");
            });
            $("#usaCarte").change(function() {
                $("#carta_div").css("visibility", "visible");
            });
            $("#tbl_riepilogo").DataTable();
        });
    </script>
</body>

</html>