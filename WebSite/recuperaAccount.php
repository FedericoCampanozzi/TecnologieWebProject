<!DOCTYPE html>
<html lang="it">
<?php
    require_once("utils/htmlHelper.php");
    $hh = new HTML_Helper();
    $hh->generate_header("Recurepa Account", "recuperaAccount.php");
?>
    <body>
        <main>
            <section>
              <form action="utils/update.php" method="post">
                <input type="hidden" name="obj_to_update" id="obj_to_update" value="account">
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