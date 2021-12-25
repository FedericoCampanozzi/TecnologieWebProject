<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
var_dump($_REQUEST);
$obj = $_REQUEST["obj_to_insert"];
$msg = new MesssageModalHelper();
switch($obj){
    case("fornitore"):
        if($dbh->insert_fornitore($_REQUEST["p_iva"], $_REQUEST["ragione_sociale"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"]))
            $msg->show_in_next_page("fornitore inserito correttamente", "homepageAdmin.php", "homepageAdmin.php", MsgType::Successfull);
        else
            $msg->show_in_next_page("c'e' stato un problema inaspettato, fornitore non inserito", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error);
        break;
    case("fornitura"):
        break;
    case("carta"):
        if($dbh->insert_fornitore($_REQUEST["numero"], $_REQUEST["datascadenza"], $_REQUEST["ccv"], $_REQUEST["tipo"], $_SESSION["IdUtente"]))
            $msg->show_in_next_page("fornitore inserito correttamente", "userProfile.php?showTab=\"card\"", "userProfile.php", MsgType::Successfull);
        else
            $msg->show_in_next_page("c'e' stato un problema inaspettato, carta di pagamento non inserito", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error);
        break;
    case("ordine"):
        break;
    case("riga_carrello"):
        if(!$dbh->insert_rc($_REQUEST["product_id"], $_SESSION["idUtente"]))
            $msg->show_in_next_page("prodotto non inserito", "homepageUser.php", "homepageUser.php", MsgType::Error);
        break;
        break;
    case("recapito"):
        if($dbh->insert_recapito($_REQUEST["via"], $_REQUEST["ragione_sociale"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"]))
            $msg->show_in_next_page("recapito inserito correttamente", "userProfile.php?showTab=\"address\"", "userProfile.php", MsgType::Successfull);
        else
            $msg->show_in_next_page("c'e' stato un problema inaspettato, recapito non inserito", "homepageAdmin.php", "homepageAdmin.php", MsgType::Error);
        break;
    default : die("codice inserimento non trovato");
    break;
}
?>