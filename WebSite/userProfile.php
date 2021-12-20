<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Profilo Utente</title>
    <link href="css/reset.css" type="text/css">
    <link href="css/style2.css" type="text/css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- cdn for modernizr, if you haven't included it already -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
    <!-- polyfiller file to detect and load polyfills -->
    <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
</head>

<body>
    <?php
    require_once("utils/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
    ?>
    <main>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#dati" type="button" role="tab" aria-controls="dati" aria-selected="true">Dati Personali</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Carrello</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Metodi di pagamento</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#indirizzo" type="button" role="tab" aria-controls="contact" aria-selected="false">Indirizzo</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dati" role="tabpanel" aria-labelledby="dati-tab">
            <div style="background-color: red;">
                <form action="utils/update.php" method="get">
                    <input type="text" name="obj_to_insert" style="display: none;" value="fornitore">
                    <div class="form-group">
                        <label for="p_iva"></label>
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
                    <button type="submit" class="btn btn-primary">Aggiorna Dati</button>
                </form>
            </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="-tab">
                <div>
                    <form action="utils/insert.php" method="get">
                        <input type="text" name="obj_to_insert" style="display: none;" value="fornitore">
                        <div class="form-group">
                            <label for="p_iva"></label>
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
                        <button type="submit" class="btn btn-primary">Acquista</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div>
                <form action="utils/update.php" method="get">
                    <input type="text" name="obj_to_insert" style="display: none;" value="fornitore">
                    <div class="form-group">
                        <label for="p_iva"></label>
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
                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                </form>
                </div>
            </div>
            <div class="tab-pane fade" id="indirizzo" role="tabpanel" aria-labelledby="contact-tab">
                <div>
                <form action="utils/insert.php" method="get">
                    <input type="text" name="obj_to_insert" style="display: none;" value="recapito">
                        <label for="via">Via : </label>
                        <input type="text" class="form-control" name="via" id="via" placeholder="Via">
                    </div>
                    <div class="form-group">
                        <label for="numero_civico">Numero Civico : </label>
                        <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Numero Civico">
                    </div>
                    <div class="form-group">
                        <label for="numero_civico">Interno (opzionale) : </label>
                        <input type="text" class="form-control" name="numero_civico" id="numero_civico" placeholder="Iinterno">
                    </div>
                    <div class="form-group">
                        <label for="citta">Citt&agrave; : </label>
                        <input type="text" class="form-control" name="citta" id="citta" placeholder="citt&agrave;">
                    </div>
                    <button type="submit" class="btn btn-primary">Aggiungi</button>
                </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>