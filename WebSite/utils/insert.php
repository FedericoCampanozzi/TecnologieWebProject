<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$dbg = false;
if ($dbg) {
    var_dump($_SESSION);
    var_dump($_REQUEST);
}

$obj = $_REQUEST["obj_to_insert"];
$msg = new MesssageModalHelper();

switch ($obj) {
    case ("fornitore"):
        if ($dbh->insert_fornitore($_REQUEST["p_iva"], $_REQUEST["ragione_sociale"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"]))
            $msg->show_in_next_page("fornitore inserito correttamente", "homepageAdmin.php", "homepageAdmin.php", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong> fornitore non inserito</strong>", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error, $dbg);
        break;
    case ("fornitura"):
        if ($dbh->insert_fornitura($_REQUEST["qta"], $_REQUEST["az_prodotto"], $_SESSION["PIVA_Azienda"]))
            $msg->show_in_next_page("fornitura inserita correttamente", "homepageSupplier.php?showTab=forniture", "forniture", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dasda", "homepageSupplier.php?showTab=forniture", "forniture", MsgType::Error, $dbg);
        break;
    case ("prodotto"):
        if ($dbh->insert_prodotto($_REQUEST["nome"], $_REQUEST["desc"], $_REQUEST["prezzo"], $_SESSION["PIVA_Azienda"], 'cactus.jpg', $_REQUEST["categoria"]))
            $msg->show_in_next_page("prodotto inserito correttamente", "homepageSupplier.php?showTab=product", "product", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dasda", "homepageSupplier.php?showTab=product", "product", MsgType::Error, $dbg);
        break;
    case ("user"):
        if ($dbh->insert_user($_REQUEST["username"], $_REQUEST["psw"], $_REQUEST["nome"], $_REQUEST["cognome"], $_REQUEST["dataNascita"], $_REQUEST["email"], $_REQUEST["telefono"]))
            $msg->show_in_next_page("utente inserito", "newUser.php", "newUser", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("errore", "newUser.php", "newUser", MsgType::Error, $dbg);
        break;
    case ("carta"):
        if ($dbh->insert_carta($_REQUEST["numero"], $_REQUEST["datascadenza"], $_REQUEST["ccv"], $_REQUEST["tipo_carta"], $_SESSION["IdUtente"]))
            $msg->show_in_next_page("carta inserita correttamente", "userProfile.php?showTab=card", "card", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong> carta di pagamento non inserito</strong>", "userProfile.php?showTab=card", "card", MsgType::Error, $dbg);
        break;
    case ("recapito"):
        if ($dbh->insert_recapito($_REQUEST["via"], $_REQUEST["nc"], $_REQUEST["citta"], $_REQUEST["interno"], $_SESSION["IdUtente"]))
            $msg->show_in_next_page("recapito inserito correttamente", "userProfile.php?showTab=address", "address", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>recapito non inserito</strong>", "userProfile.php?showTab=address", "address", MsgType::Error, $dbg);
        break;
    case ("ordine"):
        if ($dbh->insert_ordine($_REQUEST["useContanti"], $_REQUEST["note"], $_SESSION["IdUtente"], $_REQUEST["select_add"], $_REQUEST["select_carta"])){
            $id_ordine = $dbh->last_ordine($_SESSION["IdUtente"]);
            $usr_cart = $dbh->get_carrello($_SESSION["IdUtente"]);
            for($i = 0; $i < sizeof($usr_cart); $i++){
                $dbh->update_riga_carrello($_SESSION["IdUtente"], $usr_cart[$i]["IdProdotto"], $id_ordine);  
            }
            $msg->show_in_next_page("ordine inserito", "pagamento.php", "pagamento.php", MsgType::Successfull, $dbg);
        }else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>ordine non inserito</strong>", "pagamento.php", "pagamento.php", MsgType::Error, $dbg);
        break;
    case ("rc_usr_hp"):
        if ($dbh->insert_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]))
            $msg->show_next_page("homepageUser.php", $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>prodotto non inserito</strong>", "homepageUser.php", "cart", MsgType::Error, $dbg);
        break;
    case ("rc_usr_prof"):
        if ($dbh->insert_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]))
            $msg->show_next_page("userProfile.php?showTab=cart", $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>prodotto non inserito</strong>", "userProfile.php?showTab=cart", "cart", MsgType::Error, $dbg);
        break;
    default:
        die("codice inserimento non trovato");
        break;
}
