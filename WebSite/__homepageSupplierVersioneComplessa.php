<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/database.php");
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_header("Pagina Fornitore", "", true, "homepageSupplier.php", true);
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$tab = "supp_profile";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
$stati = array(false, false, false, false, false, false, false, false,);
$stati[0] = isset($_REQUEST[""]) && $_REQUEST[""];
$stati[0] = isset($_REQUEST[""]) && $_REQUEST[""];
$stati[0] = isset($_REQUEST[""]) && $_REQUEST[""];
?>

<body>
    <main>
        <header>
        </header>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="supp_profile-tab" data-toggle="tab" href="#supp_profile" role="tab" aria-controls="supp_profile" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                    </svg> Dati Aziendali
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="forniture-tab" data-toggle="tab" href="#forniture" role="tab" aria-controls="forniture" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck-flatbed" viewBox="0 0 16 16">
                        <path d="M11.5 4a.5.5 0 0 1 .5.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-4 0 1 1 0 0 1-1-1v-1h11V4.5a.5.5 0 0 1 .5-.5zM3 11a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm1.732 0h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4a2 2 0 0 1 1.732 1z" />
                    </svg> Analisi Forniture
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ven-tab" data-toggle="tab" href="#ven" role="tab" aria-controls="ven" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                    </svg> Analisi Vendite
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="supp_profile" role="tabpanel" aria-labelledby="supp_profile-tab">
                <section>
                    <form action="utils/update.php" method="get">
                        <input type="hidden" name="obj_to_insert" value="fornitore">
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
                        <div class="form-group">
                            <label for="citta">Pec-Mail : </label>
                            <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                        </div>
                        <div class="form-group">
                            <label for="citta">Info-Mail : </label>
                            <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                        </div>
                        <div class="form-group">
                            <label for="citta">Telefono : </label>
                            <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                        </div>
                        <div class="form-group">
                            <label for="citta">Fax : </label>
                            <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                        </div>
                        <button type="submit" class="btn btn-primary">Aggiorna Dati</button>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="forniture" role="tabpanel" aria-labelledby="ven-tab">
                <section>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Barre Verticali</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Barre Orizzontali</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Torta</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Torta Area</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Linea</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Ciambella</label>
                        </div>
                        <div>
                            Visualizza :
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" id="upd_Dettaglio">
                                <label class="form-check-label" for="upd_Dettaglio">
                                    Dettaglio
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" id="upd_AnnoMese">
                                <label class="form-check-label" for="upd_AnnoMese">
                                    Anno Mese
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" id="upd_Prodotto">
                                <label class="form-check-label" for="upd_Prodotto">
                                    Prodotto
                                </label>
                            </div>
                        </div>
                        <form action="utils/insert.php" method="get">
                            <input type="hidden" name="obj_to_insert" value="fornitore">
                            <div class="form-group">
                                <select class="form-control" id="az_prodotti" name="az_prodotti">";
                                    <?php
                                    $prod = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                                    for ($i = 0; $i < sizeof($prod); $i++)
                                        echo "<option value=" . $prod[$i]["ID"] . ">" . $prod[$i]["Nome"] . "</option>";
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="qta" class="form-label">Quantit&agrave;: </label>
                                <input type="range" class="form-range" id="qta">
                                <label id="qta_out"></label>
                            </div>
                            <button type="submit" class="btn btn-primary">Inserisci</button>
                        </form>
                    </div>
                    <div class="row py-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="card rounded shadow border-0">
                                <div class="card-body p-5 bg-white rounded">
                                    <div class="table-responsive">
                                        <div class="container">
                                            <canvas id="graficoForniture"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane" id="ven" role="tabpanel" aria-labelledby="ven-tab">
                <section>
                    <div class="row py-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="card rounded shadow border-0">
                                <div class="card-body p-5 bg-white rounded">
                                    <div class="table-responsive">
                                        <div class="container">
                                            <canvas id="graficoVenditeProdUser"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col-lg-10 mx-auto">
                            <div class="card rounded shadow border-0">
                                <div class="card-body p-5 bg-white rounded">
                                    <div class="table-responsive">
                                        <div class="container">
                                            <canvas id="graficoVenditeAnnoMese"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <script>
            //let curTab = "forniture-tab";

            function Color(r, g, b, a) {
                this.r = r;
                this.g = g;
                this.b = b;
                this.a = a;
            }

            function colorLerp(a, b, t) {
                c = new Color(255, 255, 255, 255);
                c.r = a.r + (b.r - a.r) * t,
                    c.g = a.g + (b.g - a.g) * t,
                    c.b = a.b + (b.b - a.b) * t,
                    c.a = a.a + (b.a - a.a) * t
                return "rgb(" + c.r + "," + c.g + "," + c.b + "," + c.a + ",)";
            }

            $(document).ready(function() {
                let gForn = document.getElementById("graficoForniture").getContext('2d');
                let gVen = document.getElementById("graficoVenditeProdUser").getContext('2d');
                let fornLabel = [
                    <?php
                    //$dbh->get
                    ?>
                ];
                let fornData = [
                    <?php
                    ?>
                ];
                let venLabel = [
                    <?php
                    //$prod = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                    //for($i=0;$i<sizeof($prod);$i++) echo "\"".$prod[$i]["Nome"]."\"";
                    ?>
                ];
                let venData = [
                    <?php
                    ?>
                ];

                let a = new Color(255, 255, 255, 255);
                let b = new Color(255, 255, 255, 255);

                let fornColor = [];
                let venColor = [];

                for (let t = 0.0; t <= 1.0; t += 1.0 / fornLabel.length) {
                    fornColor.push(colorLerp(a, b, t));
                }

                a = [255, 255, 255, 255];
                b = [255, 255, 255, 255];

                for (let i = 0; i < fornData.length; i++) {
                    venColor.push(colorLerp(a, b, t));
                }

                let chart = new Chart(gForn, {
                    type: 'bar',
                    data: {
                        labels: fornLabel,
                        datasets: [{
                            label: "Forniture",
                            data: fornData,
                            backgroundColor: fornColor
                        }]
                    }
                });
                chart = new Chart(gVen, {
                    type: 'bar',
                    data: {
                        labels: venLabel,
                        datasets: [{
                            label: "Vendite",
                            data: venData,
                            backgroundColor: venColor
                        }]
                    }
                });

                //$("li a").click(function(){
                //    curTab = $(this).id
                //});
                $('a[href="#<?php echo $tab; ?>"]').addClass("active");
                $('#<?php echo $tab; ?>').addClass("active");

                $('[id*=upd]').change(function() {
                    var params = new URLSearchParams();
                    params.set("showTab", "forniture");
                    window.location.href = "homepageSupplier.php?" + params.toString();
                });
            });
        </script>
        <footer>
            <p> Federico Campanozzi </p>
        </footer>
    </main>
</body>

</html>