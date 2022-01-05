<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$dbg = false;
if($dbg){
    var_dump($_SESSION);
    var_dump($_REQUEST);
}
$obj = $_REQUEST["obj_to_delete"];
$msg = new MesssageModalHelper();
switch($obj){
    case("riga_carrello"):
        $dbh->delete_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]);
        /*
        if ($dbh->delete_rc($_REQUEST["product_id"], $_SESSION["IdUtente"]))
            $msg->show_next_page("userProfile.php?showTab=cart", $dbg);
        else
            $msg->show_in_next_page("c'&egrave; stato un problema inaspettato, <br> <strong>prodotto non inserito</strong>", "userProfile.php?showTab=cart", "cart", MsgType::Error, $dbg);
        */
        break;
    default : die("codice inserimento non trovato");
    break;
}
?>