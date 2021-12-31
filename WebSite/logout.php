<!DOCTYPE html>
<html lang="it">

<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Logout");
session_destroy();
?>

<body>
  <main>
    <?php $hh->generate_header("Grazie e Arriverdi"); ?>  
    <div class="gfx-link scrollable-content">
      Se vuoi ritornare alla pagina di login, clicca <a href="index.php">qui</a>
    </div>
    <?php $hh->generate_footer(); ?>
  </main>
</body>

</html>