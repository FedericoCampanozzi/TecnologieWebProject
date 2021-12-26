<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/modalMessageHelper.php");
require_once("utils/htmlHelper.php");
require_once("utils/database.php");
$hh = new HTML_Helper();
$hh->generate_header(" Pagamento ", "pagamento.php", true, "pagamento.php");
if ($_SESSION["last_page"] == "pagamento.php" && $_SESSION["msg_type"] == MsgType::Successfull) {
    echo "<script>location.href='homepageUser.php';</script>";
}
$idUtente = $_SESSION["IdUtente"];
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
?>

<body>
    <main>
        <section>
            <div>
                <div class="row py-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="card rounded shadow border-0">
                            <div class="card-body p-5 bg-white rounded">
                                <div class="table-responsive">
                                    <table id="tbl_carrello_utente" style="width:100%;" class="table table-striped table-bordered">
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
                                            for ($i = 0; $i < sizeof($usr_cart); $i++) {
                                                echo "
                                                        <tr>
                                                            <td><img src=.\images\prodotti\\" . $usr_cart[$i]["ImagePath"] . " width=\"64\" height=\"64\">                                                            </td>
                                                            <td>" . $usr_cart[$i]["Nome"] . "</td>
                                                            <td>" . $usr_cart[$i]["Qta"] . "</td>
                                                            <td>" . $usr_cart[$i]["PrezzoUnitario"] . "  &euro; </td>
                                                            <td>" . $usr_cart[$i]["PrezzoTotale"] . "  &euro; </td>
                                                        </tr> ";
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
            <form action="utils/insert.php" method="post">
                <input type="hidden" value="ordine" name="obj_to_insert" id="obj_to_insert">
                <label class="form-check-label" for="useContanti">
                    Pagare alla consegna ?
                </label>
                <input class="form-check-input" type="checkbox" value="" id="useContanti" name="useContanti">
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
                <div class="form-group">
                    <label for="select_add">Seleziona un indirizzo :</label>
                    <select class="form-control" id="select_add" name="select_add">
                        <?php
                        $usr_add = $dbh->get_recapiti($idUtente);
                        for ($i = 0; $i < sizeof($usr_carte); $i++) {
                            echo "<option value=" . $usr_add[$i]["ID"] . ">" . $usr_add[$i]["Via"] . "," . $usr_add[$i]["NumeroCivico"] . " - " . $usr_add[$i]["Citta"] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <div class="md-form">
                        <label for="note">Inserire alcune note per il fattorino : </label>
                        <textarea id="note" name="note" class="md-textarea form-control" rows="3"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Acquista</button>
            </form>
        </section>
    </main>
    <script>
        $(document).ready(function() {
            $("#tbl_carrello_utente").DataTable();
            $("#useContanti").change(function() {
                if (this.checked) {
                    $("#carta_div").addClass("hidden-field");
                } else {
                    $("#carta_div").removeClass("hidden-field");
                }
            });
        });
    </script>
</body>

</html>