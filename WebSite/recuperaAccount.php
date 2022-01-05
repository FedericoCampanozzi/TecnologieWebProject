<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Recurepa Account");
$hh->check_modals("acc_recuperato");
$hh->check_modals("acc_non_recuperato");
?>

<body>
  <main>
    <?php $hh->generate_header("Recupera Account"); ?>
    <section class="container">
      <form action="utils/update.php" method="post">
        <input type="hidden" name="obj_to_update" id="obj_to_update" value="account">
        <div class="form-group">
          <label for="user">Inserire E-Mail address o Username : </label>
          <input type="text" class="form-control" id="user" name="user" placeholder="Enter Email or Username">
        </div>
        <button type="submit" class="btn-rounded-1">Recupera Account</button>
      </form>
    </section>
    <aside class="gfx-link">
      Clicca <a href="index.php">qui</a> per tornare alla homepage
    </aside>
    <?php $hh->generate_footer_fix_no_scroll(); ?>
  </main>
</body>

</html>