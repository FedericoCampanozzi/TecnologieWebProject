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
                <a class="nav-link" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                    </svg> Prodotti
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
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 512 512">
                        <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
                        C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
                        C192.485,366.299,187.095,360.91,180.455,360.91z" />
                        <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
                        c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
                        c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                    </svg> Logout
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="supp_profile" role="tabpanel" aria-labelledby="supp_profile-tab">
                <div class="container" style="margin-top:50px;">
                    <?php
                    /* si dovrebbe fare al login */
                    $log = $dbh->get_fornitore_login($_SESSION["PIVA_Azienda"]);
                    ?>
                    <form action="utils/update.php" method="get">
                        <input type="hidden" name="obj_to_update" value="fornitore">
                        <div class="form-group">
                            <label for="via">Via : </label>
                            <input type="text" class="form-control" name="via" id="via" placeholder="<?php echo $log[0]["Via"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="numero_civico">Numero Civico : </label>
                            <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="<?php echo $log[0]["NumeroCivico"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="citta">Citt&agrave; : </label>
                            <input type="text" class="form-control" name="citta" id="citta" placeholder="<?php echo $log[0]["Citta"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pecMail">Pec-Mail : </label>
                            <input type="text" class="form-control" name="pecMail" id="pecMail" placeholder="<?php echo $log[0]["PecMail"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="infoMail">Info-Mail : </label>
                            <input type="text" class="form-control" name="infoMail" id="infoMail" placeholder="<?php echo $log[0]["InfoMail"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="tell">Telefono : </label>
                            <input type="text" class="form-control" name="tell" id="tell" placeholder="<?php echo $log[0]["Telefono"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="fax">Fax : </label>
                            <input type="text" class="form-control" name="fax" id="fax" placeholder="<?php echo $log[0]["Fax"]; ?>">
                        </div>
                        <button type="submit" class="btn-rounded-2">Aggiorna Dati</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="forniture" role="tabpanel" aria-labelledby="ven-tab">
                <div class="container">
                    <canvas id="graficoForniture">

                    </canvas>
                </div>
                <form action="utils/insert.php" method="get">
                    <input type="hidden" name="obj_to_insert" value="fornitura">
                    <div class="card rounded shadow border-0">
                        <div class="card-body p-5 bg-white rounded">
                            <div class="table-responsive">
                                <div class="container">
                                    <table id="tbl_forniture" style="width:150%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome Prodotto</th>
                                                <th>Qta</th>
                                                <th>Data Consegna Merce</th>
                                                <th>Costo Totale</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $forniture = $dbh->get_forniture($_SESSION["PIVA_Azienda"]);
                                            for ($i = 0; $i < sizeof($forniture); $i++) {
                                                echo "
                                                <tr>
                                                    <td>" . $forniture[$i]["Nome"] . "</td>                                                    
                                                    <td>" . $forniture[$i]["Qta"] . "</td>
                                                    <td>" . $forniture[$i]["DataConsegnaMerce"] . "</td>
                                                    <td>" . $forniture[$i]["CostoTotale"] . "</td>
                                                    <td> </td>
                                                </tr>";
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="az_prodotto" name="az_prodotto">";
                                                        <?php
                                                        $prod = $dbh->get_products_forn($_SESSION["PIVA_Azienda"]);
                                                        for ($i = 0; $i < sizeof($prod); $i++)
                                                            echo "<option value=" . $prod[$i]["ID"] . ">" . $prod[$i]["Nome"] . "</option>";
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="range" class="form-range" id="qta" name="qta">
                                                    <label id="qta_out"></label>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button type="submit" class="btn-rounded-2">Inserisci</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="product" role="tabpanel" aria-labelledby="product">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive">
                            <form action="utils/insert.php" method="get">
                                <input type="hidden" name="obj_to_insert" value="prodotto">
                                <table id="tbl_prodotti" style="width:100%" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th></th>
                                            <th>Descrizione</th>
                                            <th style="min-width: 60px;">Prezzo</th>
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
                                                        <td><img src=.\images\prodotti\\" . $prod[$i]["ImagePath"] . " width=\"64\" height=\"64\"></td>
                                                        <td>" . $prod[$i]["Descrizione"] . " </td>
                                                        <td>" . $prod[$i]["Prezzo"] . " &euro; </td>
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
                                                <input type="text" class="form-control" name="desc" id="desc" placeholder="Descrizione">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="prezzo" id="prezzo" placeholder="Prezzo" style="width: 80%;margin-right:0;display:inline;"> &euro;
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
                                                <button type="submit" class="btn-rounded-2">Aggiungi</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="ven" role="tabpanel" aria-labelledby="ven-tab">
                <div style="height: auto;width:70%;margin:5% 15%">
                    <canvas id="graficoVenditeProdUser">

                    </canvas>
                </div>
            </div>
        </div>

        <script>
            function Color(r, g, b, a) {
                this.r = parseFloat(r);
                this.g = parseFloat(g);
                this.b = parseFloat(b);
                this.a = parseFloat(a);
            }

            function colorLerp(a, b, t) {
                c = new Color(255, 255, 255, 255);
                c.r = a.r + (b.r - a.r) * t,
                    c.g = a.g + (b.g - a.g) * t,
                    c.b = a.b + (b.b - a.b) * t,
                    c.a = a.a + (b.a - a.a) * t
                return "rgba(" + c.r + "," + c.g + "," + c.b + "," + c.a + ")";
            }

            $(document).ready(function() {
                let gForn = document.getElementById("graficoForniture").getContext('2d');
                let gVen = document.getElementById("graficoVenditeProdUser").getContext('2d');
                let fornLabel = [<?php $hh->generate_js_array_2($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), array("MeseNome", "Nome")) ?>];
                let fornData = [<?php $hh->generate_js_array($dbh->get_tot_forniture($_SESSION["PIVA_Azienda"]), "Totale") ?>];
                let venLabel = [<?php $hh->generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "Nome") ?>];
                let venData = [<?php $hh->generate_js_array($dbh->get_tot_products($_SESSION["PIVA_Azienda"]), "QtaVenduta") ?>];

                let fornColor = [];
                let venColor = [];

                let a = new Color(102, 0, 204, 240);
                let b = new Color(255, 153, 0, 155);

                for (let t = 0.0; t <= 1.0; t += 1.0 / fornLabel.length) {
                    fornColor.push(colorLerp(a, b, t));
                }

                a = new Color(0, 128, 43, 150);
                b = new Color(0, 0, 0, 50);

                for (let t = 0.0; t <= 1.0; t += 1.0 / venLabel.length) {
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
                    },
                    options: {

                        scales: {
                            x: {
                                min: 0,
                                max: 500
                            },
                            y: {
                                min: 0,
                                max: 500
                            }
                        }
                    }
                });
                chart = new Chart(gVen, {
                    type: 'bar',
                    data: {
                        labels: venLabel,
                        datasets: [{
                            label: "",
                            data: venData,
                            backgroundColor: venColor
                        }]
                    }
                });

                $("#qta_out").text($("#qta").val());
                $("#qta").on('input', function() {
                    $("#qta_out").text($(this).val())
                });

                $('a[href="#<?php echo $tab; ?>"]').addClass("active");
                $('#<?php echo $tab; ?>').addClass("active");

                $("#tbl_prodotti").DataTable();
                $("#tbl_forniture").DataTable();
            });
        </script>
        <?php $hh->generate_footer(); ?>
    </main>
</body>

</html>