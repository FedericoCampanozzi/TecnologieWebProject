<?php
session_start();
require_once("database.php");
require_once("modalMessageHelper.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
$dbg = false;
if ($dbg) {
    var_dump($_SESSION);
    echo "<br><br><br>";
    var_dump($_REQUEST);
}
$obj = $_REQUEST["obj_to_update"];
$msg = new MesssageModalHelper();
switch ($obj) {
    case ("fornitore"):
        if ($dbh->update_fornitore(
            $_SESSION["PIVA_Azienda"],
            $_REQUEST["via"],
            $_REQUEST["numero_civico"],
            $_REQUEST["citta"],
            $_REQUEST["pecMail"],
            $_REQUEST["infoMail"],
            $_REQUEST["tell"],
            $_REQUEST["fax"]
        ))
            $msg->show_in_next_page("dati aggiornati", "homepageSupplier?showTab=supp_profile", "supp_profile", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dati non aggiornati", "homepageSupplier?showTab=supp_profile", "supp_profile", MsgType::Error, $dbg);
        break;
    case ("password"):
        if($dbh->find_login($_SESSION["IdUtente"], $_REQUEST["old_psw"]))
            if ($dbh->update_user_psw($_SESSION["IdUtente"], $_REQUEST["new_psw"]))
                $msg->show_in_next_page("dati aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Successfull, $dbg);
            else
                $msg->show_in_next_page("dati non aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        else
            $msg->show_in_next_page("le password non corrispondono", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        break;
    case ("user"):
        if ($dbh->update_user($_SESSION["IdUtente"], $_REQUEST["username"], $_REQUEST["email"], $_REQUEST["tell"]))
            $msg->show_in_next_page("dati aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("dati non aggiornati", "userProfile.php?showTab=usr_profile", "usr_profile", MsgType::Error, $dbg);
        break;
    case ("login"):
        if ($dbh->find_user_from_username($_REQUEST["user"])) {
            if ($dbh->find_login($_REQUEST["user"], $_REQUEST["password"])) {
                $login = $dbh->get_login($_REQUEST["user"], $_REQUEST["password"]);

                $_SESSION["IdUtente"] = $login[0]["ID"];
                $_SESSION["usr_un"] = $login[0]["Username"];
                $_SESSION["usr_nome"] = $login[0]["Nome"];
                $_SESSION["usr_cognome"] = $login[0]["Cognome"];
                $_SESSION["usr_dn"] = $login[0]["DataDiNascita"];
                $_SESSION["usr_email"] = $login[0]["EMail"];
                $_SESSION["usr_email"] = $login[0]["EMail"];
                $_SESSION["usr_tell"] = $login[0]["Telefono"];
                $_SESSION["img_name"] = $login[0]["ImagePath"];

                if(!is_null($login[0]["PIVA_Fornitore"])){
                    $_SESSION["PIVA_Azienda"] = $login[0]["PIVA_Fornitore"];
                    //$_SESSION["rs_az"] = $login[0]["RagioneSociale"];
                    //$_SESSION["via_az"] = $login[0]["RagioneSociale"];
                    //$_SESSION["PIVA_Azienda"] = $login[0]["RagioneSociale"];
                    //$_SESSION["PIVA_Azienda"] = $login[0]["RagioneSociale"];
                }

                if ($login[0]["IdRuolo"] == 3) echo "<script>location.href='../homepageAdmin.php';</script>";
                if ($login[0]["IdRuolo"] == 4) echo "<script>location.href='../homepageUser.php';</script>";
                if ($login[0]["IdRuolo"] == 5) echo "<script>location.href='../homepageSupplier.php';</script>";
                if ($login[0]["IdRuolo"] == 6) echo "<script>location.href='../homepageDeliveryMan.php';</script>";
            } else {
                $msg->show_in_next_page("password non corrispondente", "index.php", "index.php", MsgType::Error, $dbg);
            }
        } else{
            $msg->show_in_next_page("utente non trovato", "index.php", "index.php", MsgType::Error, $dbg);
        }
        break;
    case ("account"):
        if ($dbh->find_user_from_username($_REQUEST["user"])) {
            $newPsw = "";
            $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()');
            shuffle($seed);
            foreach (array_rand($seed, 10) as $k) $newPsw .= $seed[$k];
            var_dump($newPsw);
            $dbh->update_user_psw($_REQUEST["user"], $newPsw);
            $login = $dbh->get_login($_REQUEST["user"], $newPsw);
            $msg->show_in_next_page(
                "abbiamo cambiato la password per l'utente " . $login[0]["Username"] . " con e-mail : " . $login[0]["EMail"] . " in " . $newPsw,
                "recuperaAccount.php",
                "acc_recuperato",
                MsgType::Information,
                $dbg
            );
        } else{
            $msg->show_in_next_page("utente non trovato", "recuperaAccount.php", "acc_non_recuperato", MsgType::Error, $dbg);
        }
        break;
    case("ordine"):
        if ($dbh->update_ordine($_SESSION["IdUtente"], $_REQUEST["id_ordine"]))
            $msg->show_in_next_page("Consegna registrata correttamente", "homepageDeliveryMan.php", "homepageDeliveryMan.php", MsgType::Successfull, $dbg);
        else
            $msg->show_in_next_page("Consegna errata", "homepageDeliveryMan.php", "homepageDeliveryMan.php", MsgType::Error, $dbg);
        break;
    default:
        die("codice inserimento non trovato");
        break;
}
