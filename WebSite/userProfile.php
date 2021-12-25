<?php
session_start();
var_dump($_SESSION);
require_once("utils/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$tab = "usr_profile";
if (isset($_GET["showTab"])) {
    $tab = $_GET["showTab"];
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Profilo Utente</title>
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/main-style.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[href="#<?php echo $tab; ?>"]').addClass("active");
            $('#<?php echo $tab; ?>').addClass("active");
        });
    </script>
</head>

<body>
    <main>
        <ul class="nav nav-tabs" id="userTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="usr_profile-tab" data-toggle="tab" href="#usr_profile" role="tab" aria-controls="usr_profile" aria-selected="true">Dati Personali</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">Carrello</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="card-tab" data-toggle="tab" href="#card" role="tab" aria-controls="card" aria-selected="false">Carte</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Recapiti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="ordini-tab" data-toggle="tab" href="#ordini" role="tab" aria-controls="ordini" aria-selected="false">Ordini</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="usr_profile" role="tabpanel" aria-labelledby="usr_profile-tab">
                <section>
                    <h1>Dati Personali</h1>
                </section>
                <div>
                    <div class="user-image-profile">
                    </div>
                    <div class="form-group">
                        <label> Nome : <?php echo $_SESSION["usr_nome"]; ?> </label>
                        <label> Cognome : <?php echo $_SESSION["usr_cognome"]; ?> </label>
                        <label> Data di nascita : <?php echo $_SESSION["usr_dn"]; ?> </label>
                    </div>
                </div>
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
                Clicca <a href="recuperaAccount.php">qui</a> per recuperare la password
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
                                            <table id="tbl_carrello_utente" style="width:100%" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>ImagePath</th>
                                                        <th>Descrizione</th>
                                                        <th>Fornitore</th>
                                                        <th>Qt.&agrave;</th>
                                                        <th>Prezzzo Unitario</th>
                                                        <th>Prezzo Totale</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                    <div>
                        <div class="row py-5">
                            <div class="col-lg-10 mx-auto">
                                <div class="card rounded shadow border-0">
                                    <div class="card-body p-5 bg-white rounded">
                                        <div class="table-responsive">
                                            <table id="tbl_carte_utente" style="width:100%" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Numero</th>
                                                        <th>Data di scadenza</th>
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
                                                            <td>" . $carte[$i]["DataScadenza"] . "</td>
                                                            <td>" . $carte[$i]["Tipo"] . "</td>
                                                            <td> ******* <td>
                                                            <td> <td>
                                                        </tr>";
                                                    }
                                                    ?>
                                                    <form action="utils/insert.php" method="post">
                                                        <tr>
                                                            <input type="text" name="obj_to_insert" class="hidden-field" id="obj_to_insert" value="carta">
                                                            <td>
                                                                <input type="text" class="form-control" name="numero" id="numero" placeholder="Numero">
                                                            </td>
                                                            <td>
                                                                <input type="date" class="form-control" name="datascadenza" id="datascadenza" placeholder="Data di scadenza">
                                                            </td>
                                                            <td>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" name="tipo" id="tipo">
                                                                    <a class="dropdown-item" href="#">Visa</a>
                                                                    <a class="dropdown-item" href="#">MasterCard</a>
                                                                    <a class="dropdown-item" href="#">Bancomat</a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ccv" id="ccv" placeholder="CCV">
                                                            </td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary">Aggiungi</button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="tab-pane" id="address" role="tabpanel" aria-labelledby="address-tab">
                <section>
                    <h1>
                        Recapiti
                    </h1>
                    <div>
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
                                                            <td>" . $recapiti[$i]["Via"] . "</td>
                                                            <td>" . $recapiti[$i]["NumeroCivico"] . "</td>
                                                            <td>" . $recapiti[$i]["Citta"] . "</td>
                                                            <td>" . $interno . "</td>
                                                            <td></td>
                                                        </tr>";
                                                    }
                                                    ?>
                                                    <form action="utils/insert.php" method="get">
                                                        <input type="text" name="obj_to_insert" class="hidden-field" value="recapito">
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
                                                                <button type="submit" class="btn btn-primary">Aggiungi</button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <script>

            </script>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    </main>
</body>

</html>