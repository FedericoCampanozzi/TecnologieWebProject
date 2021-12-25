<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$obj = $_GET["obj_to_update"];
$msg = new MesssageModalHelper();
switch($obj){
   case("user"):
        //if($dbh->update_riga_carrello($_GET["p_iva"], $_GET["ragione_sociale"], $_GET["via"], $_GET["numero_civico"], $_GET["citta"]))
        //    $msg->show_in_next_page("fornitore inserito correttamente", "homepageAdmin.php");
        //else
        //    $msg->insert_fail("c'e' stato un problema inaspettato, fornitore non inserito", "homepageAdmin.php");
        //break;
    case("ordine"):
        break;
    default : die("codice aggiornamento non trovato");
    break;
}
?>