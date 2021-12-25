<?php
  session_start();
  require_once("utils/database.php");
  require_once("utils/modalMessageHelper.php");
  $dbh = new DatabaseHelper("localhost", "root", "", "plant");
  $msh = new MesssageModalHelper();
  if($dbh->find_login($_POST["user"], $_POST["password"])) {
    $login = $dbh->get_login($_POST["user"], $_POST["password"]);
    
    $_SESSION["IdUtente"] = $login[0]["ID"];
    $_SESSION["usr_un"] = $login[0]["Username"];
    $_SESSION["usr_nome"] = $login[0]["Nome"];
    $_SESSION["usr_cognome"] = $login[0]["Cognome"];
    $_SESSION["usr_dn"] = $login[0]["DataDiNascita"];
    $_SESSION["usr_email"] = $login[0]["EMail"];
    $_SESSION["usr_tell"] = $login[0]["Telefono"];

    if($login[0]["IdRuolo"] == 3) echo "<script>location.href='homepageAdmin.php';</script>";
    if($login[0]["IdRuolo"] == 4) echo "<script>location.href='homepageUser.php';</script>";
    if($login[0]["IdRuolo"] == 5) echo "<script>location.href='homepageSupplier.php';</script>";
    if($login[0]["IdRuolo"] == 6) echo "<script>location.href='homepageDeliveryMan.php';</script>";
  } else {
    $msh->show_in_next_page("nome utente oppure e-mail non trovata", "index.php", "login.php", MsgType::Error);
  }
?>