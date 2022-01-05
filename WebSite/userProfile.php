<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
require_once("utils/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$tab = "usr_profile";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
$hh = new HTML_Helper();
$hh->generate_page_head("Profilo Utente", "userProfile.php", true, "noCheck");
?>

<body>
    <main>
        <?php
        $hh->generate_header("Profilo Utente");
        $hh->generate_user_nav();
        ?>
        <script>
            $(document).ready(function() {
                $('a[href="#<?php echo $tab; ?>"]').addClass("active");
                $('#<?php echo $tab; ?>').addClass("active");
                $("#tbl_carrello_utente").DataTable();
                $("#tbl_carte_utente").DataTable();
                $("#tbl_recapiti_utente").DataTable();
                $("#addCard").click(function() {
                    $.post('./utils/insert.php', {
                        obj_to_insert: "carta",
                        numero: $("#numero").val(),
                        datascadenza: $("#datascadenza").val(),
                        tipo_carta: $("#tipo_carta").val(),
                        ccv: $("#ccv").val()
                    }, function(response) {
                        location.reload();
                        console.log("Response: " + response);
                    });
                });
            });
        </script>
        <?php
        $hh->check_modals("usr_profile");
        $hh->check_modals("cart");
        $hh->check_modals("card");
        $hh->check_modals("address");
        $hh->check_modals("card-denaro");
        ?>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="usr_profile-tab" data-toggle="tab" href="#usr_profile" role="tab" aria-controls="usr_profile" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                    </svg> Dati Personali
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> Carrello
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="card-tab" data-toggle="tab" href="#card" role="tab" aria-controls="card" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                    </svg> Carte
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                    </svg> Recapiti
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ordini-tab" data-toggle="tab" href="#ordini" role="tab" aria-controls="ordini" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg> Ordini
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container top-40" id="usr_profile" role="tabpanel" aria-labelledby="usr_profile-tab">
                <div class="row">
                    <div class="col-4">
                        <img width="250px" height="300px" alt="" src="./images/utenti/<?php echo $_SESSION["img_name"]; ?>">
                        <label> Nome : <?php echo $_SESSION["usr_nome"]; ?> </label>
                        <label> Cognome : <?php echo $_SESSION["usr_cognome"]; ?> </label>
                        <label> Data di nascita : <?php echo $_SESSION["usr_dn"]; ?> </label>
                    </div>
                    <div class="col-2">
                    </div>
                    <div class="col-6">
                        <form action="utils/update.php" method="post">
                            <input type="hidden" name="obj_to_update" value="password">
                            <div class="form-group">
                                <label for="old_psw">Vecchia Password:</label>
                                <input type="password" class="form-control" id="old_psw" name="old_psw" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                                <label for="new_psw">Nuova Password:</label>
                                <input type="password" class="form-control" id="new_psw" name="new_psw" placeholder="New Password">
                            </div>
                            <button type="submit" class="custom-btn btn-5">Cambia</button>
                        </form>
                    </div>
                </div>
                <form action="utils/update.php" method="get">
                    <div class="row">
                        <div class="col-4">
                            <input type="hidden" name="obj_to_update" value="user">
                            <div class="form-group">
                                <label for="username">Username : </label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION["usr_un"]; ?>" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email">Email : </label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION["usr_email"]; ?>" />
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="p_iva">Telefono : </label>
                                <input type="text" class="form-control" name="tell" id="tell" value="<?php echo $_SESSION["usr_tell"]; ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <input class="top-40" name="image" type="file" size="40" />
                        </div>
                        <div class="col-8">
                            <button type="submit" class="custom-btn btn-3 top-40">Aggiorna</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                <div class="scrollable-content">
                    <div class="p-5 table-responsive">
                        <table id="tbl_carrello_utente" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                    <th>Descrizione</th>
                                    <th>Fornitore</th>
                                    <th>Qt.&agrave;</th>
                                    <th>Prezzzo Unitario</th>
                                    <th>Prezzo Totale</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $usr_cart = $dbh->get_carrello($_SESSION["IdUtente"]);
                                $tot = 0;
                                for ($i = 0; $i < sizeof($usr_cart); $i++) {
                                    echo "
                                                <tr>
                                                    <td><img src=.\images\prodotti\\" . $usr_cart[$i]["ImagePath"] . " width=\"64\" height=\"64\"></td>                                                            </td>
                                                    <td>" . $usr_cart[$i]["Nome"] . "</td>
                                                    <td>" . $usr_cart[$i]["Descrizione"] . "</td>
                                                    <td>" . $usr_cart[$i]["RagioneSociale"] . "</td>
                                                    <td>" . $usr_cart[$i]["Qta"] . "</td>
                                                    <td>" . $usr_cart[$i]["PrezzoUnitario"] . "  &euro; </td>
                                                    <td>" . $usr_cart[$i]["PrezzoTotale"] . "  &euro; </td>";
                                ?>
                                        <td class="w-180">
                                            <input type="hidden" id="IdProdtto_<?php echo $i;?>" value="<?php echo $usr_cart[$i]["IdProdotto"]; ?>">
                                            <button class="icon-btn add-btn add-to-cart" id="addToCart_<?php echo $i;?>">
                                                <div class="add-icon"></div>
                                                <div class="btn-txt">Add</div>
                                            </button>
                                            <button class="icon-btn add-btn remove-from-cart"  id="removeFromCart_<?php echo $i;?>">  
                                                <div class="btn-txt">Remove</div>
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    $tot += $usr_cart[$i]["PrezzoTotale"];
                                }
                                if ($tot <> 0)
                                    echo "
                                    <tr>
                                        <td class=\"bold\"> Totale : </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td class=\"bold\"> " . $tot . " &euro; </td>
                                        <td>
                                            <form action=\"pagamento.php\" method=\"get\">
                                                <button type=\"submit\" class=\"custom-btn btn-grid-1\">Acquista</button>
                                            </form>
                                        </td>
                                    </tr>"
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="card" role="tabpanel" aria-labelledby="card-tab">
                <div class="p-5 table-responsive">
                    <table id="tbl_carte_utente" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Data di scadenza</th>
                                <th>Tipo</th>
                                <th>CCV</th>
                                <th>Disponibilit&agrave;</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $carte = $dbh->get_carte($_SESSION["IdUtente"]);
                            for ($i = 0; $i < sizeof($carte); $i++) {
                                echo "
                                                        <tr>
                                                            <td>" . $carte[$i]["Numero"] . "</td>
                                                            <td>" . $carte[$i]["DataScadenza"] . "</td>
                                                            <td>" . $carte[$i]["Tipo"] . "</td>
                                                            <td> *** </td>
                                                            <td> " . $carte[$i]["Disponibilita"] . " &euro; </td>
                                                            <td> 
                                                                <form action=\"utils/update.php\" method=\"post\">
                                                                    <input type=\"hidden\" name=\"obj_to_update\" value=\"denaro\">
                                                                    <input type=\"hidden\" name=\"numero_carta\" value=\"" . $carte[$i]["Numero"] . "\">
                                                                    <button type=\"submit\" class=\"custom-btn btn-grid-3\"> +100 &euro;</button>
                                                                </form>
                                                            </td>
                                                        </tr>";
                            }
                            ?>
                            <tr>
                                <td>
                                    <input type="text" class="form-control grid-input-so-big" name="numero" id="numero" placeholder="Numero">
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="datascadenza" id="datascadenza" placeholder="Data di scadenza">
                                </td>
                                <td>
                                    <select class="form-control grid-input-big" id="tipo_carta" name="tipo_carta">
                                        <option value="Visa">Visa</option>
                                        <option value="Mastercard">Mastercard</option>
                                        <option value="Altro">Altro</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="password" class="form-control grid-input-big" name="ccv" id="ccv" maxlength="3" placeholder="CCV">
                                </td>
                                <td></td>
                                <td>
                                    <button class="custom-btn btn-grid-1" id="addCard">Aggiungi</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="address" role="tabpanel" aria-labelledby="address-tab">
                <form action="utils/insert.php" method="get">
                    <input type="hidden" name="obj_to_insert" value="recapito">
                    <div class="p-5 table-responsive">
                        <table id="tbl_recapiti_utente" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Via</th>
                                    <th>Numero Civico</th>
                                    <th>Citt&agrave;</th>
                                    <th>Interno*</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $recapiti = $dbh->get_recapiti($_SESSION["IdUtente"]);
                                for ($i = 0; $i < sizeof($recapiti); $i++) {
                                    $interno = "mancante";
                                    if (isset($recapiti[$i]["Interno"])) {
                                        $interno = $recapiti[$i]["Interno"];
                                    }
                                    echo "
                                                        <tr>
                                                            <td>" . $recapiti[$i]["Via"] . "</td>
                                                            <td>" . $recapiti[$i]["NumeroCivico"] . "</td>
                                                            <td>" . $recapiti[$i]["Citta"] . "</td>
                                                            <td>" . $interno . "</td>
                                                            <td></td>
                                                        </tr>";
                                }
                                ?>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="nc" id="nc" placeholder="Numero Civico">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="citta" id="citta" placeholder="Citta">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="interno" id="interno" placeholder="Interno">
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
            <div class="tab-pane scrollable-content" id="ordini" role="tabpanel" aria-labelledby="ordini-tab">
                <?php
                $userOrdini = $dbh->get_user_ordini($_SESSION["IdUtente"]);
                for ($i = 0; $i < sizeof($userOrdini); $i++) {
                    if (isset($userOrdini[$i]["DataConsegna"])) {
                        echo "<div class=\"ordini-container  ordine-consegnato\">";
                    } else {
                        echo "<div class=\"ordini-container  ordine-non-consegnato\">";
                    }
                    echo "<div class=\"indirizzo\">";
                    echo           "Indirizzo : <span>" . $userOrdini[$i]["Via"] . "," . $userOrdini[$i]["NumeroCivico"] . " - " . $userOrdini[$i]["Citta"] . " </span>
                              </div>";

                    if (isset($userOrdini[$i]["DataConsegna"]))
                        echo "<div class=\"data\"> Consegnato il " . $userOrdini[$i]["DataConsegna"] . "</div>";
                    else
                        echo "<div class=\"data\"> Consegna prevista per il " . $userOrdini[$i]["DataPrevista"] . " </div>";

                    if ($userOrdini[$i]["SceltaContanti"] == 1) {
                        echo "<div class=\"pagamento\">
                                <svg xmlns=\http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
                                    <path fill-rule=\"evenodd\" d=\"M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z\"/>
                                    <path d=\"M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z\"/>
                                    <path d=\"M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z\"/>
                                    <path d=\"M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z\"/>
                                </svg>
                            </div>";
                    } else {
                        echo "<div  class=\"pagamento\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"48\" height=\"48\" fill=\"currentColor\" viewBox=\"0 0 16 16\">
                                <path d=\"M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z\"/>
                                <path d=\"M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z\"/>
                            </svg>
                            </div>
                            <div class=\"carta\"> Numero carta : " . $userOrdini[$i]["NrCarta"] . "</div>
                            <div class=\"totale\"> Totale : <span> " . $userOrdini[$i]["TotaleOrdine"] . "</span> &euro; </div>
                            ";
                    }
                    echo "</div>";
                }
                ?>
            </div>
            <script src="js/userProfile.js"></script>
            <?php $hh->generate_footer(true); ?>
    </main>
</body>

</html>