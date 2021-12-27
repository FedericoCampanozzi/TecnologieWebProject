<!DOCTYPE html>
<html lang="it">
<?php
    require_once("utils/htmlHelper.php");
    $hh = new HTML_Helper();
    $hh->generate_header("Login", "index.php");
?>
    </head>
    <body>
        <main>
          <header>
            <h1> Welcome </h1>
          </header>
            <section>
              <form action="utils/update.php" method="post">
                <input type="hidden" value="login" id="obj_to_update" name="obj_to_update">
                <div class="form-group">
                  <label for="user">Email Address or Username</label>
                  <input type="text" class="form-control" name="user" id="user" placeholder="Enter Email or Username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">
                  <img alt="" src="./images/Ico/ico-login.ico" width="36" height="16" style="padding-right:20px;"/>Login</button>
              </form>
            </section>
            <aside>
              <p>Clicca <a href="recuperaAccount.php">qui</a> per recuperare la password</p>
            </aside>
            <aside>
              <p>
                Clicca <a href="newUser.php">qui</a> per creare un account </br>
              </p>
            </aside>
            <footer>
              <p> Federico Campanozzi </p>
            </footer>
        </main>
    </body>
</html>
