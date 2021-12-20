<?php
  session_start();
  require_once("utils/database.php");
  $dbh = new DatabaseHelper("localhost", "root", "", "plant");
  if($dbh->find_login($_POST["user"], $_POST["password"])) {
    $login = $dbh->get_login($_POST["user"], $_POST["password"]);
    if($login[0]["IdRuolo"] == 3) echo "<script>location.href='homepageAdmin.php';</script>";
    if($login[0]["IdRuolo"] == 4) echo "<script>location.href='homepageUser.php';</script>";
    if($login[0]["IdRuolo"] == 5) echo "<script>location.href='homepageSupplier.php';</script>";
    if($login[0]["IdRuolo"] == 6) echo "<script>location.href='homepageDeliveryMan.php';</script>";
  } else {
    $_SESSION["IdErrore"] = 0;
    echo "<script>location.href='utils/errors.php';</script>";
  }
  $_SESSION["last_page"] = "login.php";
?>
