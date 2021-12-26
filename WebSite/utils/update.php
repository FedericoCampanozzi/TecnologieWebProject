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
$obj = $_REQUEST["obj_to_update"];
$msg = new MesssageModalHelper();
switch($obj){
    default : die("codice inserimento non trovato");
    break;
}
?>