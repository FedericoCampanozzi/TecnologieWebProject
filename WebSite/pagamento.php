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
        <div class="bot-40">
            <div class="p-5 table-responsive">
                <div class="table-caption">
                    Riepilogo Ordine
                </div>
                <table id="tbl_riepilogo" class="table table-striped table-bordered">
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
                                                            <td><img src=\"./images/prodotti/" . $usr_cart[$i]["ImagePath"] . "\" alt=\"\" width=\"64\" height=\"64\"></td>
                                                            <td>" . $usr_cart[$i]["Nome"] . "</td>
                                                            <td>" . $usr_cart[$i]["Qta"] . "</td>
                                                            <td>" . $usr_cart[$i]["PrezzoUnitario"] . "  &euro; </td>
                                                            <td>" . $usr_cart[$i]["PrezzoTotale"] . "  &euro; </td>
                                                        </tr> ";
                            $tot += $usr_cart[$i]["PrezzoTotale"];
                        }
                        echo "
                                    <tr>
                                        <td class=\"bold\"> Totale : </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class=\"bold\"> " . $tot . " &euro; </td>
                                    </tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="payment-container">
                <form action="utils/insert.php" method="post">
                    <input type="hidden" name="totale" value="<?php echo $tot; ?>">
                    <input type="hidden" value="ordine" name="obj_to_insert" id="obj_to_insert">
                    <p> Quale metodo di pagamento vuoi utilizzare ?</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usaContanti" id="usaContanti" value="SI" checked>
                        <p> Contanti (alla consegna) </p>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usaContanti" id="usaCarte" value="NO">
                        <p> Carta </p>
                    </div>
                    <div class="row" id="carta_div">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="select_carta">Seleziona una carta di pagamento : </label>
                                <select class="form-control" id="select_carta" name="select_carta">
                                    <?php
                                    $usr_carte = $dbh->get_carte($idUtente);
                                    for ($i = 0; $i < sizeof($usr_carte); $i++) {
                                        echo "<option value=" . $usr_carte[$i]["Numero"] . "> Numero Carta : " . $usr_carte[$i]["Numero"] . " Disponibilit&agrave; : " . $usr_carte[$i]["Disponibilita"] . " &euro;</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="CCV">CCV : </label>
                                <input class="form-control" type="text" name="CCV" id="CCV">
                            </div>
                        </div>
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
                    <button type="submit" class="custom-btn btn-4">Acquista</button>
                </form>
                <div class="gfx-link l-0">
                    premi <a href="homepageUser.php">qui </a> per annullare il pagamento e tornare alla homepage
                </div>
            </div>
        </div>
        <?php $hh->generate_footer_no_fix_no_scroll(); ?>
    </main>
    <script src="./js/pagamento.js"></script>
</body>

</html>