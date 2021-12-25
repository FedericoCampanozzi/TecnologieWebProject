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
        <title>Registrazione Utetne</title>
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
              <form action="utils/insert.php" method="post">
                <div>
                    <p>Inserire user name oppure e-mail</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Vecchia Password:</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nuova Password:</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Registrazione</button>
              </form>
            </section>
            <footer>
              <p> Federico Campanozzi </p>
            </footer>
        </main>
    </body>
</html>