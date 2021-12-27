<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$dbg = true;
if($dbg){
    var_dump($_SESSION);
    var_dump($_REQUEST);
}
$obj = $_REQUEST["obj_to_update"];
$msg = new MesssageModalHelper();
switch($obj){
    case("fornitore"):
        if($dbh->update_fornitore($_SESSION["PIVA_Azienda"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"], 
                $_REQUEST["pecMail"], $_REQUEST["infoMail"], $_REQUEST["tell"], $_REQUEST["fax"]))
            $msg->show_in_next_page("dati aggiornati", "homepageSupplier?showTab=supp_profile", "supp_profile", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dati non aggiornati", "homepageSupplier?showTab=supp_profile", "supp_profile", MsgType::Error, $dbg);
        break;
    case("user"):
        if($dbh->update_user($_SESSION["PIVA_Azienda"], $_REQUEST["via"], $_REQUEST["numero_civico"], $_REQUEST["citta"], 
                $_REQUEST["pecMail"], $_REQUEST["infoMail"], $_REQUEST["tell"], $_REQUEST["fax"]))
            $msg->show_in_next_page("dati aggiornati", "homepageUser?showTab=usr_profile", "usr_profile", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dati non aggiornati", "homepageUser?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        break;
    case("login"):
        if($dbh->find_user($_REQUEST["user"])) {
            if($dbh->find_login($_REQUEST["user"], $_REQUEST["password"])) {
                $login = $dbh->get_login($_REQUEST["user"], $_REQUEST["password"]);
                
                $_SESSION["IdUtente"] = $login[0]["ID"];
                $_SESSION["usr_un"] = $login[0]["Username"];
                $_SESSION["usr_nome"] = $login[0]["Nome"];
                $_SESSION["usr_cognome"] = $login[0]["Cognome"];
                $_SESSION["usr_dn"] = $login[0]["DataDiNascita"];
                $_SESSION["usr_email"] = $login[0]["EMail"];
                $_SESSION["usr_tell"] = $login[0]["Telefono"];
            
                if($login[0]["IdRuolo"] == 3) echo "<script>location.href='../homepageAdmin.php';</script>";
                if($login[0]["IdRuolo"] == 4) echo "<script>location.href='../homepageUser.php';</script>";
                if($login[0]["IdRuolo"] == 5) {
                    $_SESSION["PIVA_Azienda"] = $login[0]["PIVA_Fornitore"];
                    echo "<script>location.href='../homepageSupplier.php';</script>";
                }
                if($login[0]["IdRuolo"] == 6) echo "<script>location.href='../homepageDeliveryMan.php';</script>";
            } else {
                $msg->show_in_next_page("password non corrispondente", "index.php", "index.php", MsgType::Error, $dbg);
            }
        }else
        $msg->show_in_next_page("utente non trovato", "index.php", "index.php", MsgType::Error, $dbg);
        break;
    case("account"):
        if($dbh->find_user($_REQUEST["user"])) {
            $newPsw = "";
            $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()');
            shuffle($seed);
            foreach (array_rand($seed, 10) as $k) $newPsw .= $seed[$k];
            $dbh->update_user_psw($_REQUEST["user"], $newPsw);
            $login = $dbh->get_login($_REQUEST["user"], $newPsw);
            $msg->show_in_next_page("abbiamo cambiato la password per l'utente ".$login[0]["Username"]." con e-mail : ".$login[0]["EMail"]." in ".$newPsw, 
                "index.php", "index.php", MsgType::Information, $dbg);
        }else
            $msg->show_in_next_page("utente non trovato", "index.php", "index.php", MsgType::Error, $dbg);
        break;
    default : die("codice inserimento non trovato");
    break;
}
