<?php
    session_start();
    session_destroy();
    session_start();
    var_dump($_SESSION);
    require_once("utils/database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "plant");
    define("dir_path", "./images/");
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Homepage</title>
        <link href="css/reset.css" type="text/css">
        <link href="css/style2.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- cdn for modernizr, if you haven't included it already -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <!-- polyfiller file to detect and load polyfills -->
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    </head>
    <body>
        <main>
          <header>
            <h1> Welcome </h1>
          </header>
            <section>
              <form action="login.php" method="post">
                <div class="form-group">
                  <label for="user">Email Address or Username</label>
                  <input type="text" class="form-control" name="user" id="user" placeholder="Enter Email or Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
              </form>
            </section>
            <aside>
              <p>Clicca <a href="recuperaAccount.php">qui</a> per recuperare la password</p>
            </aside>
            <aside>
              <p>
                Clicca <a href="newUser.php">qui</a> per creare un account </br>
                Vuoi avere qualche permesso in pi&ugrave;, oppure desideri avere un'altro ruolo, contatta l'amministratore all'indirizzo mail federico.campanozzi@studio.unibo.it
              </p>
            </aside>
            <footer>
              <p> Federico Campanozzi </p>
            </footer>
        </main>
    </body>
</html>
