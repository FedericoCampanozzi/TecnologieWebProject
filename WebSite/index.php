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
          <p>Inserire nel forme le proprie credenziali</p>
          <label for="user">Email Address or Username</label>
          <input type="text" class="form-control" name="user" id="user" placeholder="Enter Email or Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="custom-btn btn-12">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/>
              <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg> Entra
          </span>
          <span>
            Login
          </span>
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