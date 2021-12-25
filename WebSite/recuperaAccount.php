<?php
session_start();
var_dump($_SESSION);
require_once("utils/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "plant");
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Recupera Account</title>
        <link href="css/reset.css" type="text/css">
        <link href="css/main-style.css" type="text/css">
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
        <main>
            <section>
              <form action="utils/update.php" method="post">
                <input type="text" name="obj_to_update" class="hidden-field" id="obj_to_update" value="account">
                <div class="form-group">
                  <label for="user">Inserire E-Mail address o Username : </label>
                  <input type="text" class="form-control" id="user" placeholder="Enter Email or Username">
                </div>
                <button type="submit" class="btn btn-primary">Recupera Account</button>
              </form>
            </section>
        </main>
    </body>
</html>