<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/database.php");
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Pagina Fornitore", "", true, true);
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$tab = "supp_profile";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
$hh->check_modals("supp_profile");
$hh->check_modals("forniture");
$hh->check_modals("product");
?>

<body>
    <main>
        <?php $hh->generate_header("Homepage Fornitore"); ?>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="supp_profile-tab" data-toggle="tab" href="#supp_profile" role="tab" aria-controls="supp_profile" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                    </svg><span>Dati Aziendali</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="forniture-tab" data-toggle="tab" href="#forniture" role="tab" aria-controls="forniture" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z" />
                    </svg><span>Analisi Forniture</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                    </svg><span>Prodotti</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ven-tab" data-toggle="tab" href="#ven" role="tab" aria-controls="ven" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg><span>Analisi Vendite</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg><span>Logout</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container" id="supp_profile" role="tabpanel" aria-labelledby="supp_profile-tab">
                <form action="utils/update.php" method="get">
                    <input type="hidden" name="obj_to_update" value="fornitore">
                    <div class="form-group">
                        <label for="via">Via : </label>
                        <input type="text" class="form-control" name="via" id="via" placeholder="<?php echo $_SESSION["ViaF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="numero_civico">Numero Civico : </label>
                        <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="<?php echo $_SESSION["NumeroCivicoF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="citta">Citt&agrave; : </label>
                        <input type="text" class="form-control" name="citta" id="citta" placeholder="<?php echo $_SESSION["CittaF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pecMail">Pec-Mail : </label>
                        <input type="text" class="form-control" name="pecMail" id="pecMail" placeholder="<?php echo $_SESSION["PecMail"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="infoMail">Info-Mail : </label>
                        <input type="text" class="form-control" name="infoMail" id="infoMail" placeholder="<?php echo $_SESSION["InfoMail"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tell">Telefono : </label>
                        <input type="text" class="form-control" name="tell" id="tell" placeholder="<?php echo $_SESSION["TelefonoF"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax : </label>
                        <input type="text" class="form-control" name="fax" id="fax" placeholder="<?php echo $_SESSION["Fax"]; ?>">
                    </div>
                    <button type="submit" class="custom-btn btn-5">Aggiorna</button>
                </form>
            </div>
            <div class="tab-pane" id="forniture" role="tabpanel" aria-labelledby="ven-tab">
                <div class="scrollable-content">
                    <div class="container">
                        <div class="table-caption">
                            Grafico Forniture
                        </div>
                        <canvas id="graficoForniture" height="200">
                        </canvas>
                        <div class="table-description">
                            In questa grafico sono riportate le consegne mensili suddivise per prodotto.
                        </div>
                    </div>
                    <form action="utils/insert.php" method="get">
                        <input type="hidden" name="obj_to_insert" value="fornitura">
                        <div class="my-table-container table-responsive">
                            <div class="table-caption">
                                Dettaglio Forniture
                            </div>
                            <table id="tbl_forniture" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome Prodotto</th>
                                        <th class="grid-input-so-big">Data Consegna Merce</th>
                                        <th class="grid-input-so-small">Qta</th>
                                        <th class="text-small">Prezzo</th>
                                        <th class="text-small">Costo Totale</th>
                                        <th class="grid-input-small"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $forniture = $dbh->get_forniture($_SESSION["PIVA_Azienda"]);
                                    for ($i = 0; $i < sizeof($forniture); $i++) {
                                        echo "
                                                    <tr>
                                                        <td>" . $forniture[$i]["Nome"] . "</td>                                                    
                                                        <td class=\"grid-input-so-big\">" . $forniture[$i]["DataConsegnaMerce"] . "</td>
                                                        <td class=\"grid-input-so-small\">" . $forniture[$i]["Qta"] . "</td>
                                                        <td>" . $forniture[$i]["Prezzo"] . " &euro;</td>
                                                        <td>" . $forniture[$i]["CostoTotale"] . " &euro;</td>
                                                        <td> </td>
                                                    </tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <select class="form-control grid-input-so-big" id="az_prodotto" name="az_prodotto">
                                                <?php
                                                $prod = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                                                for ($i = 0; $i < sizeof($prod); $i++)
                                                    echo "<option value=" . $prod[$i]["ID"] . ">" . $prod[$i]["Nome"] . "</option>";
                                                ?>
                                            </select>
                                        </td>
                                        <td></td>
                                        <td class="grid-input-so-small">
                                            <input type="range" class="form-range" id="qta" name="qta">
                                            <label id="qta_out"></label>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="grid-input-small">
                                            <button type="submit" class="custom-btn btn-grid-1">Inserisci</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="product" role="tabpanel" aria-labelledby="product">
                <div class="scrollable-content">
                    <form action="utils/insert.php" method="get">
                        <input type="hidden" name="obj_to_insert" value="prodotto">
                        <div class="container">
                            <div class="table-caption">
                                Elenco Prodotti
                            </div>
                            <div class="table-description">
                                In questa tabella ci sono tutti i prodotti che l'azienda vende, con la possibilit&agrave; di aggiungerne di nuovi
                            </div>
                        </div>
                        <div class="p-5 table-responsive">
                            <table id="tbl_prodotti" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th></th>
                                        <th>Descrizione</th>
                                        <th class="grid-input-big">Prezzo</th>
                                        <th>Categoria</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $prod = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                                    for ($i = 0; $i < sizeof($prod); $i++) {
                                        echo "<tr>
                                                        <td>" . $prod[$i]["Nome"] . " </td>
                                                        <td><img alt=\"\" src=\"./images/prodotti/" . $prod[$i]["ImagePath"] . "\" width=\"64\" height=\"64\"></td>
                                                        <td>" . $prod[$i]["Descrizione"] . " </td>
                                                        <td class=\"grid-input-big\">" . $prod[$i]["Prezzo"] . " &euro; </td>
                                                        <td>" . $prod[$i]["NomeC"] . " </td>
                                                        <td> </td>
                                                    </tr>";
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <textarea name="desc" id="desc" placeholder="Descrizione" class="md-textarea form-control gfx-not-resizable" rows="4"></textarea>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control inline-table-text grid-input-big" name="prezzo" id="prezzo" placeholder="Prezzo"> &euro;
                                        </td>
                                        <td>
                                            <select id="categoria" name="categoria" class="form-control">
                                                <?php
                                                $categorie = $dbh->get_categoria();
                                                for ($j = 0; $j < sizeof($categorie); $j++) {
                                                    echo "<option value=" . $categorie[$j]["ID"] . ">" . $categorie[$j]["Nome"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="custom-btn btn-grid-1">Aggiungi</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="ven" role="tabpanel" aria-labelledby="ven-tab">
                <div class="table-caption">
                    Grafico Vendite
                </div>
                <div class="container">
                    <canvas id="graficoVenditeProdUser" height="200">
                    </canvas>
                    <div class="table-description">
                        In questa tabella ci sono tutti i prodotti che l'azienda vende, con la possibilit&agrave; di aggiungerne di nuovi
                    </div>
                </div>
            </div>
        </div>
        <script src="./js/color.js"></script>
        <script src="./js/graph.js"></script>
        <script>
            $(document).ready(function() {
                let fornLabel = [<?php $hh->generate_js_array_2($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), array("MeseNome", "Nome")) ?>];
                let fornData = [<?php $hh->generate_js_array($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), "Totale") ?>];
                let venLabel = [<?php $hh->generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "Nome") ?>];
                let venGuadagnoData = [<?php $hh->generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "GuadagnoTotale") ?>];
                let venData = [<?php $hh->generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "QtaVenduta") ?>];

                let gd_forn = []
                let gd_ven = []

                gd_forn.push(new GraphDataGenerator(
                    new Color(255, 153, 0, 255),
                    new Color(102, 0, 204, 150),
                    fornData,
                    "forniture"));

                gd_ven.push(new GraphDataGenerator(
                    new Color(255, 153, 153, 255),
                    new Color(51, 102, 255, 150),
                    venData,
                    "vendite"
                ));
                gd_ven.push(new GraphDataGenerator(
                    new Color(153, 153, 255, 255),
                    new Color(0, 204, 153, 255),
                    venGuadagnoData,
                    "guadagno"
                ));

                generateBarGraph("graficoForniture", gd_forn, "Prodotti al mese", "Qt.à Fornita", fornLabel, 0, 500);
                generateBarGraph("graficoVenditeProdUser", gd_ven, "Prodotti", "Qt.à Venduta / Guadagno(€)", venLabel, 0, 300);

                $('a[href="#<?php echo $tab; ?>"]').addClass("active");
                $('#<?php echo $tab; ?>').addClass("active");
            });
        </script>
        <script src="./js/homepageSupplier.js"></script>
        <?php $hh->generate_footer_fix_scroll(); ?>
    </main>
</body>

</html>