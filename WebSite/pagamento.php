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
                require_once("errorsMessage.php");
                require_once("successfullMessage.php");
                $dbh = new DatabaseHelper("localhost", "root", "", "plant");
                $idUtente = $_SESSION["idUtente"];
                $usr_pagamento = $dbh->get_carte($idUtente);
                $usr_recapiti = $dbh->get_recapiti($idUtente);
                $usr_carrello = $dbh->get_carrello($idUtente);
                //$succMsg = new SuccessfullMsgUtility();
                //$errMsg = new ErrorsMsgUtility();
                if($dbh->insert_ordine($idUtente)){
                    $idOrdine = $dbh->last_ordine($idUtente);
                    for($i=0;$i<sizeof($usr_carrello);$i++){
                        if(!$dbh->update_riga_carrello($idUtente, $usr_carrello[$i]["IdProdotto"], $idOrdine)){
                            die("riga ".$i." non aggiornata --- contattare l'amministratore");
                        }
                    }
                    //$succMsg->insert_successfull("Ordine inserito correttamente", "homepageUser.php");
                } else{
                    //$errMsg->insert_fail("Ordine non inserito per un errore non identificato", "homepageUser.php");
                }
            ?>
        </main>
    </body>
</html>