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
$hh->generate_header("Profilo Utente", "userProfile.php", true, "noCheck");
?>

<body>
    <main>
    <div class="navbar">
        <a href="homepageUser.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
          </svg> Home</a>
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg> Profilo Utente</a>
        <a href="contactSupport.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-telephone-inbound-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0z" />
          </svg> Servizio Clienti</a>
        <a href="logout.php">
          <img alt="" src="./images/Ico/ico-logout.jpg" width="16" height="16" /> Logout</a>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-fw fa-search"></i> Search</button>
        </form>
      </div>
        <script>
        $(document).ready(function() {
            $('a[href="#<?php echo $tab; ?>"]').addClass("active");
            $('#<?php echo $tab; ?>').addClass("active");
            $("#tbl_carrello_utente").DataTable();
            $("#tbl_carte_utente").DataTable();
            $("#tbl_recapiti_utente").DataTable();
            $("#tbl_recapiti_utente").DataTable();
        });
    </script>
        <?php
        require_once("utils/modalMessageHelper.php");
        $msg = new MesssageModalHelper();
        $msg->check_modals("usr_profile");
        $msg->check_modals("cart");
        $msg->check_modals("card");
        $msg->check_modals("address");
        ?>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="usr_profile-tab" data-toggle="tab" href="#usr_profile" role="tab" aria-controls="usr_profile" aria-selected="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                    </svg> Dati Personali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> Carrello</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="card-tab" data-toggle="tab" href="#card" role="tab" aria-controls="card" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-front-fill" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z" />
                    </svg> Carte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z" />
                    </svg> Recapiti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ordini-tab" data-toggle="tab" href="#ordini" role="tab" aria-controls="ordini" aria-selected="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                    </svg> Ordini</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="usr_profile" role="tabpanel" aria-labelledby="usr_profile-tab">
                <section>
                    <h1>Dati Personali</h1>
                </section>
                <div class="user-image-profile">
                    <img alt="">
                </div>
                <div class="form-group user-dati">
                    <label> Nome : <?php echo $_SESSION["usr_nome"]; ?> </label> </br>
                    <label> Cognome : <?php echo $_SESSION["usr_cognome"]; ?> </label> </br>
                    <label> Data di nascita : <?php echo $_SESSION["usr_dn"]; ?> </label> </br>
                </div>
                <div class="dati-user-update">
                    <form action="utils/update.php" method="get">
                        <input type="text" name="obj_to_insert" class="hidden-field" value="user">
                        <div class="form-group">
                            <label for="p_iva">Username : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" value="<?php echo $_SESSION["usr_un"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="p_iva">Email : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" value="<?php echo $_SESSION["usr_email"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="p_iva">Telefono : </label>
                            <input type="text" class="form-control" name="p_iva" id="p_iva" value="<?php echo $_SESSION["usr_tell"]; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Aggiorna</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="cart" role="tabpanel" aria-labelledby="cart-tab">
                <section>
                    <h1>
                        Carrello
                    </h1>
                    <div>
                        <div class="row py-5">
                            <div class="col-lg-10 mx-auto">
                                <div class="card rounded shadow border-0">
                                    <div class="card-body p-5 bg-white rounded">
                                        <div class="table-responsive">
                                            <table id="tbl_carrello_utente" style="min-width:900px;" class="table table-striped table-bordered">
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
                                                        <th></th>
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
                                                        <td style=\"max-width:150px;\">" . $usr_cart[$i]["Descrizione"] . "</td>
                                                        <td>" . $usr_cart[$i]["RagioneSociale"] . "</td>
                                                        <td>" . $usr_cart[$i]["Qta"] . "</td>
                                                        <td>" . $usr_cart[$i]["PrezzoUnitario"] . "  &euro; </td>
                                                        <td>" . $usr_cart[$i]["PrezzoTotale"] . "  &euro; </td>";
                                                    ?>
                                                        <td>
                                                            <form action="utils/insert.php" method="post">
                                                                <input type="text" name="product_id" class="hidden-field" id="product_id" value="<?php echo $usr_cart[$i]["IdProdotto"]; ?>">
                                                                <input type="text" name="obj_to_insert" class="hidden-field" id="obj_to_insert" value="rc_usr_prof">
                                                                <button type="submit" class="rounded-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 16 16">
                                                                        <path fill="rgb(0, 255, 0)" stoke="black" stroke-width="2" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form action="utils/delete.php" method="post">
                                                                <input type="text" name="product_id" class="hidden-field" id="product_id" value="<?php echo $usr_cart[$i]["IdProdotto"]; ?>">
                                                                <input type="text" name="obj_to_delete" class="hidden-field" id="obj_to_delete" value="riga_carrello">
                                                                <button type="submit" class="rounded-btn">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 16 16">
                                                                        <path fill="rgb(255, 0, 0)" stoke="black" stroke-width="2" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z" />
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        </tr>
                                                    <?php
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
                    <form action="pagamento.php" method="get">
                        <button type="submit" class="btn btn-primary">Procedi all'ordine</button>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="card" role="tabpanel" aria-labelledby="card-tab">
                <section>
                    <h1>
                        Carte
                    </h1>
                    <form action="utils/insert.php" method="post">
                        <input type="text" name="obj_to_insert" class="hidden-field" id="obj_to_insert" value="carta">
                        <div class="row py-5">
                            <div class="col-lg-10 mx-auto">
                                <div class="card rounded shadow border-0">
                                    <div class="card-body p-5 bg-white rounded">
                                        <div class="table-responsive">
                                            <table id="tbl_carte_utente" style="width:100%" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Numero</th>
                                                        <th style="max-width: 100px;">Data di scadenza</th>
                                                        <th>Tipo</th>
                                                        <th>CCV</th>
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
                                                            <td style=\"max-width: 150px;\">" . $carte[$i]["DataScadenza"] . "</td>
                                                            <td>" . $carte[$i]["Tipo"] . "</td>
                                                            <td> <td>
                                                            <td> <td>
                                                        </tr>";
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
                                                        </td>
                                                        <td style="max-width: 175px;">
                                                            <input type="date" class="form-control" name="datascadenza" id="datascadenza" placeholder="Data di scadenza">
                                                        </td>
                                                        <td>                                                        
                                                            <select class="form-control" id="tipo_carta" name="tipo_carta">
                                                                <option value="Visa">Visa</option>
                                                                <option value="Mastercard">Mastercard</option>
                                                                <option value="Altro">Altro</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="ccv" id="ccv" placeholder="CCV">
                                                        </td>
                                                        <td>
                                                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="address" role="tabpanel" aria-labelledby="address-tab">
                <section>
                    <h1>
                        Recapiti
                    </h1>
                    <form action="utils/insert.php" method="get">
                        <input type="hidden" name="obj_to_insert" value="recapito">
                        <div class="row py-5">
                            <div class="col-lg-10 mx-auto">
                                <div class="card rounded shadow border-0">
                                    <div class="card-body p-5 bg-white rounded">
                                        <div class="table-responsive">
                                            <table id="tbl_recapiti_utente" style="width:100%" class="table table-striped table-bordered">
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
                                                            <td style=\"min-width:200px\">" . $recapiti[$i]["Via"] . "</td>
                                                            <td style=\"min-width:150px\">" . $recapiti[$i]["NumeroCivico"] . "</td>
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
                                                            <button type="submit" class="btn btn-primary add-btn">Aggiungi</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class="tab-pane" id="ordini" role="tabpanel" aria-labelledby="ordini-tab">
                <section>
                    <h1>
                        Ordini
                    </h1>
                    <?php
                    $userOrdini = $dbh->get_user_ordini($_SESSION["IdUtente"]);
                    for ($i = 0; $i < sizeof($userOrdini); $i++) {
                        echo "<div>
                                <div>" . $userOrdini[$i]["Via"] . " </div>
                                <div>" . $userOrdini[$i]["NumeroCivico"] . " </div>
                                <div>" . $userOrdini[$i]["Citta"] . " </div>";

                        if (isset($userOrdini[$i]["DataConsegna"])) {
                            echo "<div>" . $userOrdini[$i]["DataConsegna"] . "</div>";
                        } else {
                            echo "<div>" . $userOrdini[$i]["DataPrevista"] . " </div> 
                                    <div>" . $userOrdini[$i]["Stato"] . "</div>";
                        }
                        if ($userOrdini[$i]["SceltaContanti"]) {
                            echo "<div></div>";
                        } else {
                            echo "<div></div><div>" . $userOrdini[$i]["NrCarta"] . "</div>";
                        }
                        echo "</div>";
                    }
                    ?>
                </section>
            </div>
        </div>
    </main>
</body>

</html>