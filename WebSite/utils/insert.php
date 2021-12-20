<?php
require_once("database.php");
require_once("errorsMessage.php");
require_once("successfullMessage.php");
session_start();
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$obj = $_GET["obj_to_insert"];
$succMsg = new SuccessfullMsgUtility();
$errMsg = new ErrorsMsgUtility();
var_dump($obj);
$_SESSION["last_page"] = "insert.php";
switch($obj){
    case("fornitore"):
        if($dbh->insert_fornitore($_GET["p_iva"], $_GET["ragione_sociale"], $_GET["via"], $_GET["numero_civico"], $_GET["citta"]))
            $succMsg->insert_successfull("fornitore inserito correttamente", "homepageAdmin.php");
        else
            $errMsg->insert_fail("c'e' stato un problema inaspettato, fornitore non inserito", "homepageAdmin.php");
        break;
    case("fornitura"):
        break;
    case("carta"):
        if($dbh->insert_fornitore($_GET["p_iva"], $_GET["ragione_sociale"], $_GET["via"], $_GET["numero_civico"], $_GET["citta"]))
            $succMsg->insert_successfull("fornitore inserito correttamente", "homepageAdmin.php");
        else
            $errMsg->insert_fail("c'e' stato un problema inaspettato, fornitore non inserito", "homepageAdmin.php");
        break;
    case("composizione"):
        break;
    case("ordine"):
        break;
    case("riga_carrello"):
        break;
    case("recapito"):
        break;
    default : die("");
    break;
}
?>