<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Login", "index.php");
?>

<body>
  <main>
    <?php $hh->generate_header("Welcome"); ?>
    <section class="centerd-itm">
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
        <button type="submit" class="btn-rounded-1">
          <img alt="" src="./images/Ico/ico-login.ico" width="36" height="16" class="distance-to-img"/>Login
        </button>
      </form>
    </section>
    <aside class="gfx-link">
      Clicca <a href="recuperaAccount.php">qui</a> per recuperare la password
    </aside>
    <aside class="gfx-link">
      Clicca <a href="newUser.php">qui</a> per creare un account
    </aside>
    <aside class="gfx-link">
      Per contattare l'assistenza scrivere una mail al seguente indirizzo : <br> federico.campanozzi@studio.unibo.it
    </aside>
    <?php $hh->generate_footer(); ?>
  </main>
</body>

</html>