<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title> --- </title>
        <link href="css/reset.css" type="text/css">
        <link href="css/style2.css" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
        <main>
            <?php
                require_once("utils/database.php");
                $dbh = new DatabaseHelper("localhost", "root", "", "plant");
                $usr_pagamento = $dbh->get_carte($_SESSION["idUtente"]);
                $usr_recapiti = $dbh->get_recapiti($_SESSION["idUtente"]);
                $usr_carrello = $dbh->get_carrello($_SESSION["idUtente"]);
                $dbh->insert_ordine($_SESSION["idUtente"]);
            ?>
        </main>
    </body>
</html>