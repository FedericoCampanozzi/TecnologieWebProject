<!DOCTYPE html>
<html lang="it">
<?php
require_once("utils/htmlHelper.php");
$hh = new HTML_Helper();
$hh->generate_page_head("Support");
?>

<body>
  <main>
    <?php 
      $hh->generate_header("Contact"); 
      $hh->generate_user_nav();
    ?>
    <section>
      Per contattare l'amministratore scrivere una mail a federico.campanozzi@studio.unibo.it
    </section>
    <?php $hh->generate_footer(); ?>
  </main>
</body>

</html>