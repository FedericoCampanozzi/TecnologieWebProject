<?php
  require_once("utils/database.php");
  require_once("utils/modalMessageHelper.php");
  $dbh = new DatabaseHelper("localhost", "root", "", "plant");
  $msh = new MesssageModalHelper();
  session_start();
  if($dbh->find_login($_POST["user"], $_POST["password"])) {
    $login = $dbh->get_login($_POST["user"], $_POST["password"]);
    if($login[0]["IdRuolo"] == 3) echo "<script>location.href='homepageAdmin.php';</script>";
    if($login[0]["IdRuolo"] == 4) echo "<script>location.href='homepageUser.php';</script>";
    if($login[0]["IdRuolo"] == 5) echo "<script>location.href='homepageSupplier.php';</script>";
    if($login[0]["IdRuolo"] == 6) echo "<script>location.href='homepageDeliveryMan.php';</script>";
  } else {
    $msh->show_in_next_page("nome utente oppure e-mail non trovata", "index.php", "login.php", MsgType::Error);
  }
?>